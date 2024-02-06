<!-- resources/views/tasks/edit.blade.php -->
@extends('layouts/layoutMaster')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add category
                    <a href="{{url('admin/report')}}" class="btn btn-primary float-end">BACK</a>
                </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/report')}}" method="POST">
                        @csrf 
                        <div class="mb-3">
                            <label for="">category name</label>
                            <input type="text" name="category_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
