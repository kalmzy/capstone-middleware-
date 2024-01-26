<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brick\Math\BigDecimal;
use Brick\Math\RoundingMode;

class Page2 extends Controller
{
  public function index()
  {
    $months = [1, 2, 3, 4, 5];
    $sales = [100, 120, 130, 150, 180];

    // Convert sample data to BigDecimal objects
    $months = array_map(fn($value) => BigDecimal::of($value), $months);
    $sales = array_map(fn($value) => BigDecimal::of($value), $sales);

    // Assuming $currentMonth is the current month's x-value
    $currentMonth = BigDecimal::of(6); // Change this to the actual current month's value

    // Calculate the mean of x and y
    $meanMonth = BigDecimal::of(0);
    $meanSale = BigDecimal::of(0);

    // Calculate the slope (m) and y-intercept (b)
    $numerator = BigDecimal::of(0);
    $denominator = BigDecimal::of(0);

    foreach ($months as $key => $month) {
        if ($month->compareTo($currentMonth) === 0) {
            continue; // Skip the predicting month's data for linear regression
        }
        $numerator = $numerator->plus($month->minus($meanMonth)->multipliedBy($sales[$key]->minus($meanSale)));
        $denominator = $denominator->plus($month->minus($meanMonth)->multipliedBy($month->minus($meanMonth)));
    }

    $slope = $numerator->dividedBy($denominator, 10, RoundingMode::HALF_UP);
    $intercept = $meanSale->minus($slope->multipliedBy($meanMonth));

    // Predict the next month's sale
    $predictedSale = $slope->toFloat() * $currentMonth->toFloat() + $intercept->toFloat();

    // Prepare data for the chart
    $xValues = array_map(fn($value) => $value->toFloat(), $months); // Convert BigDecimal to float
    $regressionLine = [];
    foreach ($xValues as $x) {
        if ($x === $currentMonth->toFloat()) {
            continue; // Skip the predicting month's x-value for regression line
        }
        $regressionLine[] = ['x' => $x, 'y' => $slope->toFloat() * $x + $intercept->toFloat()];
    }

    // Display only the predicted value for the next month
    $xValues[] = $currentMonth->toFloat();
    $sales[] = null; // Set the actual value for the predicting month as null
    $salesPredictionOnly = [$predictedSale];

    return view('content.pages.pages-page2', compact('xValues', 'sales', 'regressionLine', 'salesPredictionOnly'));

  }
}