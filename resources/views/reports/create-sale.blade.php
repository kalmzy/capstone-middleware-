<!-- resources/views/tasks/edit.blade.php -->
@extends('layouts/layoutMaster')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add product
                    <a href="{{url('admin/report')}}" class="btn btn-primary float-end">BACK</a>
                </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/report/sale')}}" method="POST">
                        @csrf 
                        <div class="mb-3">
                            <label for="">Select product</label>
                            <select name="product_id" class="form-control">
                                @foreach ($products as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">quantity sold</label>
                            <input type="text" name="quantity_sold" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Sale Date</label>
                            <input type="date" name="sale_date" class="form-control">
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
