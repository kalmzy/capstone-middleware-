<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brick\Math\BigDecimal;
use Brick\Math\RoundingMode;
use App\Models\Sale;
use App\Models\LmsG41Product;
use App\Models\PredictedSale;
use App\Models\LmsG45MonthlyPredictedSale;

class Page2 extends Controller
{
  public function index(Request $request)
  {
    // Fetch data from database
    $products = LmsG41Product::all();

    // Fetch all sales data without filtering by product initially
    $allSales = Sale::all();

    // Check if a product is selected
    $selectedProduct = $request->input('product');

    // Set default selected product to the first product if not already set
    if (!$selectedProduct && $products->isNotEmpty()) {
      $selectedProduct = $products->first()->id;
    }

    // Filter sales data for the selected product if it's provided
    if ($selectedProduct) {
      $sales = $allSales->where('product_id', $selectedProduct);
    } else {
      $sales = $allSales;
    }

    // Perform regression analysis to get predicted sales for each product
    $predictedSalesData = $this->fetchNextMonthSales($allSales, $products);

    // Fetch the latest month from the sales data
    $latestSale = $allSales->last();
    $latestSaleMonth = $latestSale ? $latestSale->created_at->format('n') : date('n');

    // Calculate the next month
    $predictedMonth = ($latestSaleMonth + 1) % 12;
    if ($predictedMonth == 0) {
      $predictedMonth = 12; // Set to December if the next month exceeds 12
    }

    // Save predicted sales to the database
    $this->savePredictedSalesToDatabase($predictedSalesData, $predictedMonth);

    // Return the data to the view
    return view('content.pages.pages-page2', [
      'sales' => $sales,
      'products' => $products,
      'predictedSalesData' => $predictedSalesData,
      'selectedProduct' => $selectedProduct,
      'predictedNextMonthSales' => $predictedSalesData[$selectedProduct]['predictedNextMonthSales'] ?? null,
      'predictedProductName' => $predictedSalesData[$selectedProduct]['predictedProductName'] ?? '',
      'predictedMonth' => $predictedMonth,
    ]);
  }

  private function fetchNextMonthSales($sales, $products)
  {
    // Initialize an array to store predictions for each product
    $predictions = [];

    // Iterate through each product
    foreach ($products as $product) {
      // Filter sales data for the current product
      $productSales = $sales->where('product_id', $product->id);

      // Perform regression analysis for the current product
      $predictedSalesData = $this->calculateRegressionForProduct($productSales);

      // Add the predicted sales data to the predictions array
      $predictions[$product->id] = [
        'predictedProductName' => $product->product_name,
        'predictedNextMonthSales' => $predictedSalesData['predictedNextMonthSales'],
        'regressionLine' => $predictedSalesData['regressionLine'],
      ];
    }

    return $predictions;
  }

  private function calculateRegressionForProduct($productSales)
  {
    // Extract timestamps (created_at) and amounts
    $timestamps = $productSales->pluck('created_at');
    $yValues = $productSales->pluck('quantity_sold');

    // Calculate the month based on created_at timestamps
    $xValues = $timestamps->map(function ($timestamp) {
      return $timestamp->format('n'); // 'n' returns the month without leading zeros
    });

    // Convert sample data to BigDecimal objects
    $xValues = $xValues->toArray();
    $yValues = $yValues->toArray();

    $xValues = array_map(fn($value) => BigDecimal::of($value), $xValues);
    $yValues = array_map(fn($value) => BigDecimal::of($value), $yValues);

    // Initialize total variables for mean calculation
    $totalX = BigDecimal::zero();
    $totalY = BigDecimal::zero();
    $countX = count($xValues);
    $countY = count($yValues);

    // Sum up all x and y values
    foreach ($xValues as $key => $x) {
      $totalX = $totalX->plus($x);
      $totalY = $totalY->plus($yValues[$key]);
    }

    // Calculate the mean of x and y, ensuring we don't divide by zero
    $meanX = $countX > 0 ? $totalX->dividedBy(BigDecimal::of($countX), 10, RoundingMode::HALF_UP) : BigDecimal::zero();
    $meanY = $countY > 0 ? $totalY->dividedBy(BigDecimal::of($countY), 10, RoundingMode::HALF_UP) : BigDecimal::zero();

    // Calculate the slope (m) and intercept (b)
    $numerator = BigDecimal::zero();
    $denominator = BigDecimal::zero();

    foreach ($xValues as $key => $x) {
      $numerator = $numerator->plus($x->minus($meanX)->multipliedBy($yValues[$key]->minus($meanY)));
      $denominator = $denominator->plus($x->minus($meanX)->multipliedBy($x->minus($meanX)));
    }

    if ($denominator->isPositive()) {
      $slope = $numerator->dividedBy($denominator, 10, RoundingMode::HALF_UP);
      $intercept = $meanY->minus($slope->multipliedBy($meanX));

      $regressionLine = [];
      foreach ($xValues as $x) {
        $predictedY = $slope->multipliedBy(BigDecimal::of($x))->plus($intercept);
        $regressionLine[] = ['x' => $x, 'y' => $predictedY->toFloat()];
      }

      $maxMonth = max($xValues);
      $nextMonthX = $maxMonth->plus(1);
      if ($nextMonthX->toInt() > 12) {
        // If next month falls into the next year, reset to January
        $nextMonthX = BigDecimal::of(1);
      }
      $predictedNextMonthSales = $slope
        ->multipliedBy($nextMonthX)
        ->plus($intercept)
        ->toFloat();
    } else {
      $regressionLine = [];
      $predictedNextMonthSales = 0; // Handle division by zero by setting a default value
    }

    return [
      'predictedNextMonthSales' => $predictedNextMonthSales,
      'regressionLine' => $regressionLine,
    ];
  }

  private function savePredictedSalesToDatabase($predictedSalesData, $predictedMonth)
  {
    // Get all product IDs
    $productIds = array_keys($predictedSalesData);

    // Fetch existing predictions for the predicted month and products
    $existingPredictions = LmsG45MonthlyPredictedSale::whereIn('product_id', $productIds)
      ->where('month', $predictedMonth)
      ->get()
      ->keyBy('product_id');

    // Iterate through predicted sales data
    foreach ($predictedSalesData as $productId => $prediction) {
      // Check if an existing prediction exists for this product
      if (isset($existingPredictions[$productId])) {
        // Update existing prediction
        $existingPrediction = $existingPredictions[$productId];
        $existingPrediction->predicted_sales = $prediction['predictedNextMonthSales'];
        $existingPrediction->save();
      } else {
        // Create new prediction record
        $predictedSale = new LmsG45MonthlyPredictedSale();
        $predictedSale->product_id = $productId;
        $predictedSale->month = $predictedMonth;
        $predictedSale->predicted_sales = $prediction['predictedNextMonthSales'];
        $predictedSale->save();
      }
    }
  }
}
