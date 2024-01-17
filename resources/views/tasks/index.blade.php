<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.layoutMaster')
@section('title', 'Quality Data')
@section('content')
<div class="container mt-4">

<h1>Task List</h1>

<a href="{{ route('tasks.create') }}" class="btn btn-primary mb-2">Create New Task</a>

<table class="table">
    <thead>
        <tr>
            <th>Date</th>
            <th>Product</th>
            <th>Defects</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
            <tr>
                <td>{{$task->created_at->format('Y-m-d')}}</td>
                <td>{{$task->title}}</td>
                <td>{{$task->description}}</td>
                <td>
                <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
            <div class="dropdown-menu">
            <a href="{{ route('tasks.edit', $task->id) }}" class="dropdown-item">Edit</a>
            <form method="post" action="{{ route('tasks.destroy', $task->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dropdown-item">Delete</button>
                    </form>
            </div>


                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>

@endsection
