<?php

// app/Http/Controllers/TaskController.php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{

  public function index()
  {
    $Minor = Task::where('severity_level','Minor')->count();
    $Major = Task::where('severity_level','Major')->count();
    $Critical = Task::where('severity_level','Minor')->count();
    $tasks = Task::paginate(5);
    
    return view('tasks.index', compact('tasks','Minor','Major','Critical'));
  }

  public function create()
  {
    return view('tasks.create');
    
  }

  public function store(Request $request)
  {
    
    $request->validate([
      'product_unit' => ['required', Rule::exists('product', 'product_unit')],
    ]);

    Task::create($request->all());
    
    session()->flash('success', 'Record created successfully');
    return redirect()->route('tasks.index');
  }

  public function edit(Task $task)
  {
    return view('tasks.edit', compact('task'));
  }

  public function update(Request $request, Task $task)
  {
    $task->update($request->all());
    return redirect()->route('tasks.index');
  }

  public function destroy(Task $task)
  {
    $task->delete();
    return redirect()->route('tasks.index');
  }
}
