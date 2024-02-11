<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brick\Math\BigDecimal;
use Brick\Math\RoundingMode;
use App\Models\Regression;

class HomePage extends Controller
{
  public function index()
  {
    return view('content.pages.pages-home');
  }
  public function fetchsale()
  {
    // Fetch data from database
    $sales = Regression::all();

    // Extract timestamps (created_at) and amounts
    $timestamps = $sales->pluck('created_at');
    $yValues = $sales->pluck('amount');

    // Calculate the month based on created_at timestamps
    $xValues = $timestamps->map(function ($timestamp) {
      return $timestamp->format('n'); // 'n' returns the month without leading zeros
    });
    // Convert sample data to BigDecimal objects
    $xValues = $xValues->toArray();
    $yValues = $yValues->toArray();

    $xValues = array_map(fn($value) => BigDecimal::of($value), $xValues);
    $yValues = array_map(fn($value) => BigDecimal::of($value), $yValues);
    // Calculate the mean of x and y
    $meanX = BigDecimal::of(0);
    $meanY = BigDecimal::of(0);

    foreach ($xValues as $x) {
      $meanX = $meanX->plus($x);
    }

    $meanX = $meanX->dividedBy(count($xValues), 10, RoundingMode::HALF_UP);

    foreach ($yValues as $y) {
      $meanY = $meanY->plus($y);
    }

    $meanY = $meanY->dividedBy(count($yValues), 10, RoundingMode::HALF_UP);

    // Calculate the slope (m)
    $numerator = BigDecimal::of(0);
    $denominator = BigDecimal::of(0);

    foreach ($xValues as $key => $x) {
      $numerator = $numerator->plus($x->minus($meanX)->multipliedBy($yValues[$key]->minus($meanY)));
      $denominator = $denominator->plus($x->minus($meanX)->multipliedBy($x->minus($meanX)));
    }

    $slope = $numerator->dividedBy($denominator, 10, RoundingMode::HALF_UP);

    // Calculate the y-intercept (b)
    $intercept = $meanY->minus($slope->multipliedBy($meanX));

    // Prepare data for the chart
    $xValues = array_map(fn($value) => $value->toFloat(), $xValues); // Convert BigDecimal to float
    $regressionLine = [];

    foreach ($xValues as $x) {
      $regressionLine[] = ['x' => $x, 'y' => $slope->toFloat() * $x + $intercept->toFloat()];
    }

    // Add the next month to the xValues array
    $nextMonthX = BigDecimal::of(max($xValues))
      ->plus(1)
      ->toFloat();
    $xValues[] = $nextMonthX;

    // Use the regression equation to predict sales for the next month
    $predictedNextMonthSales = $slope->toFloat() * $nextMonthX + $intercept->toFloat();

    return response()->json([
      'xValues' => $xValues,
      'yValues' => $yValues,
      'regressionLine' => $regressionLine,
      'predictedNextMonthSales' => $predictedNextMonthSales,
    ]);
  }
}
