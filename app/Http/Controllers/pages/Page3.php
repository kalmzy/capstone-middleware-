<?php

namespace App\Http\Controllers\pages;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brick\Math\BigDecimal;
use Brick\Math\RoundingMode;
use App\Models\Defect;
use App\Models\Product;

class Page3 extends Controller
{
  public function index()
  {
    $defects = Defect::all();
    $defectCountByCategory = $this->getDefectCountByCategory();
    $totalDefects = array_sum($defectCountByCategory);

    return view('content.pages.pages-page3', compact('defects', 'defectCountByCategory', 'totalDefects'));
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
}
