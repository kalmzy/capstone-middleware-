<!-- resources/views/tasks/edit.blade.php -->
@extends('layouts/layoutMaster')


@section('content')

<h1>Create Defect</h1>
    <form method="POST" action="{{ route('pages-page-3.store') }}">
        @csrf
        <div class="form-group">
            <label for="product_id">Product:</label>
            <select name="product_id" id="product_id" class="form-control">
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">defects type</label>
            <select class="form-control" id="name" name="name" required>
                <option value="Dimensional">Dimensional</option>
                <option value="Surface">Surface</option>
                <option value="Material">Material</option>
                <option value="Functional">Functional</option>
                <option value="Assembly">Assembly</option>
                <option value="Aesthetic">Aesthetic</option>
                <option value="Packaging">Packaging</option>
                <option value="Labeling">Labeling</option>
            </select>
        </div>
    
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Open">Open</option>
                <option value="Resolved">Resolved</option>
                <option value="Closed">Closed</option>
            </select>
        </div>
        <div class="form-group">
            <label for="severity">Severity</label>
            <select class="form-control" id="severity" name="severity" required>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="Critical">Critical</option>
            </select>
        </div>
        <div class="form-group">
            <label for="assigned_to">Assigned To</label>
            <textarea class="form-control" id="assigned_to" name="assigned_to" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="reported_by">Reported by</label>
            <textarea class="form-control" id="reported_by" name="reported_by" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
