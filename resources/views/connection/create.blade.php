<!-- resources/views/tasks/create.blade.php -->
@extends('layouts/layoutMaster')


@section('content')
    <h1>Create New Task</h1>

    <form method="post" action="{{ route('dataCon.store') }}">
        @csrf
        <label for="product_unit">Product_unit:</label>
        <input type="text" name="product_unit" required>

        <label for="sale">Sale:</label>
        <input type="number" name="sale" required>
        

        <button type="submit">Create Task</button>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </form>

    <a href="{{ route('dataCon.index') }}" class="btn btn-secondary">Go Back</a>
@endsection
