<?php

// app/Http/Controllers/TaskController.php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\LmsG45ProductDefect;
use App\Models\LmsG41Product;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
  public function index()
  {
    $defects = LmsG45ProductDefect::paginate(8);

    $defectCountByCategory = $this->getDefectCountByCategory();
    return view('tasks.index', compact('defects', 'defectCountByCategory'));
  }

  public function create()
  {
    $products = LmsG41Product::all();
    return view('tasks.create', compact('products'));
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'product_id' => 'required|integer|exists:lms_g41_products,id',
      'name' => 'required|in:Dimensional,Surface,Material,Functional,Assembly,Aesthetic,Packaging,Labeling',
      'description' => 'required',
      'status' => 'required|in:Open,Resolved,Closed',
      'severity' => 'required|in:Low,Medium,Critical',
      'inspector' => 'required',
    ]);
    LmsG45ProductDefect::create($validatedData);

    session()->flash('success', 'Record created successfully');
    return redirect()->route('tasks.index');
  }

  public function getDefectCountByCategory()
  {
    $dimensionDefects = LmsG45ProductDefect::where('name', 'Dimensional')->count();
    $packagingDefects = LmsG45ProductDefect::where('name', 'Packaging')->count();
    $surfaceDefects = LmsG45ProductDefect::where('name', 'Surface')->count();
    $materialDefects = LmsG45ProductDefect::where('name', 'Material')->count();
    $functionalDefects = LmsG45ProductDefect::where('name', 'Functional')->count();
    $assemblyDefects = LmsG45ProductDefect::where('name', 'Assembly')->count();
    $aestheticDefects = LmsG45ProductDefect::where('name', 'Aesthetic')->count();
    $labelingDefects = LmsG45ProductDefect::where('name', 'Labeling')->count();

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
