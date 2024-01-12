<!-- resources/views/tasks/create.blade.php -->
@extends('layouts/layoutMaster')


@section('content')
    <h1>Create New Task</h1>

    <form method="post" action="{{ route('tasks.store') }}">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" required>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea>

        <button type="submit">Create Task</button>
    </form>
@endsection
