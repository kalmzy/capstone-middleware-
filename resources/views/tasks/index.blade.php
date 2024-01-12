<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.layoutMaster')

@section('content')
<div class="container mt-4">

<h1>Task List</h1>

<a href="{{ route('tasks.create') }}" class="btn btn-primary mb-2">Create New Task</a>

<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form method="post" action="{{ route('tasks.destroy', $task->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>

@endsection
