<?php

// app/Http/Controllers/TaskController.php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Defect;
use App\Models\Product;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
  public function index()
  {
    $Low = Defect::where('severity', 'Low')->count();
    $Medium = Defect::where('severity', 'Medium')->count();
    $Critical = Defect::where('severity', 'Critical')->count();
    $defects = Defect::paginate(8);

    $defectCountByCategory = $this->getDefectCountByCategory();
    return view('tasks.index', compact('defects', 'Low', 'Medium', 'Critical', 'defectCountByCategory'));
  }

  public function create()
  {
    $products = Product::all();
    return view('tasks.create', compact('products'));
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'product_id' => 'required|integer|exists:products,id',
      'name' => 'required|in:Dimensional,Surface,Material,Functional,Assembly,Aesthetic,Packaging,Labeling',
      'description' => 'required',
      'status' => 'required|in:Open,Resolved,Closed',
      'severity' => 'required|in:Low,Medium,Critical',
      'assigned_to' => 'required',
      'reported_by' => 'required',
    ]);
    Defect::create($validatedData);

    session()->flash('success', 'Record created successfully');
    return redirect()->route('tasks.index');
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
