<!-- resources/views/tasks/edit.blade.php -->
@extends('layouts/layoutMaster')


@section('content')
    <h1>Edit Task</h1>

    <form method="post" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('PUT')

        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ $task->title }}" required>

        <label for="description">Description:</label>
        <textarea name="description" required>{{ $task->description }}</textarea>

        <button type="submit">Update Task</button>
    </form>
@endsection
