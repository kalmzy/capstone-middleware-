<?php

namespace App\Http\Controllers\pages;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brick\Math\BigDecimal;
use Brick\Math\RoundingMode;
use App\Models\Defect;
use App\Models\Product;
use DateTime;
use Illuminate\Support\Facades\DB;

class Page3 extends Controller
{
  public function index()
  {
    $monthlyDefects = Defect::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('COUNT(*) as total'))
      ->groupBy('month')
      ->get();

    // Extracting months and totals with year
    $months = [];
    foreach ($monthlyDefects as $defect) {
      $formattedDate = date_create_from_format('Y-m', $defect->month);
      $months[] = $formattedDate->format('M Y'); // Format month abbreviation and year (e.g., Jan 2023)
    }

    $totals = $monthlyDefects->pluck('total')->toArray();

    $Low = Defect::where('severity', 'Low')->count();
    $Medium = Defect::where('severity', 'Medium')->count();
    $Critical = Defect::where('severity', 'Critical')->count();
    $defects = Defect::all();
    $defectCountByCategory = $this->getDefectCountByCategory();
    $defectCountByCategoryAndMonth = $this->getDefectCountByCategoryAndMonth();
    $totalDefects = array_sum($defectCountByCategory);

    return view(
      'content.pages.pages-page3',
      compact(
        'defects',
        'defectCountByCategoryAndMonth',
        'defectCountByCategory',
        'totalDefects',
        'Low',
        'Medium',
        'Critical',
        'months',
        'totals'
      )
    );
  }

  public function getDefectCountByCategory()
  {
    $dimensionDefects = Defect::where('name', 'Dimensional')->count();
    $packagingDefects = Defect::where('name', 'Packaging')->count();
    $surfaceDefects = Defect::where('name', 'Surface')->count();
    $materialDefects = Defect::where('name', 'Material')->count();
    $functionalDefects = Defect::where('name', 'Functional')->count();
    $assemblyDefects = Defect::where('name', 'Assembly')->count();
    $aestheticDefects = Defect::where('name', 'Aesthetic')->count();
    $labelingDefects = Defect::where('name', 'Labeling')->count();

    return [
      'dimension' => $dimensionDefects,
      'packaging' => $packagingDefects,
      'surface' => $surfaceDefects,
      'material' => $materialDefects,
      'functional' => $functionalDefects,
      'assembly' => $assemblyDefects,
      'aesthetic' => $aestheticDefects,
      'labeling' => $labelingDefects,
    ];
  }
  public function getDefectCountByCategoryAndMonth()
  {
    $defects = Defect::select(
      DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
      'name',
      DB::raw('COUNT(*) as total')
    )
      ->groupBy('month', 'name')
      ->get();

    $defectData = [];

    // Initialize an array to hold all months within the desired range
    $monthsInRange = [];

    // Find the earliest and latest months in the dataset
    $earliestMonth = new DateTime(Defect::min('created_at'));
    $latestMonth = new DateTime(Defect::max('created_at'));

    // Fill the array with months from the earliest to the latest in the dataset
    $currentMonth = clone $earliestMonth;
    while ($currentMonth <= $latestMonth) {
      $monthsInRange[] = $currentMonth->format('Y-m');
      $currentMonth->modify('+1 month');
    }

    // Initialize defect counts for each category for all months in range
    foreach ($monthsInRange as $month) {
      foreach ($defects as $defect) {
        $defectData[$defect->name][$month] = 0;
      }
    }

    // Update the counts with actual data
    foreach ($defects as $defect) {
      $defectData[$defect->name][$defect->month] = $defect->total;
    }

    return $defectData;
  }
}
