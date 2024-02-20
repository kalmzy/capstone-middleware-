<!-- resources/views/tasks/edit.blade.php -->
@extends('layouts/layoutMaster')


@section('content')
@if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>    
            @endif
<div class="container mb-4">
    <div class="row">
        <div class="col-md-12">
            

            <div class="card">
                <div class="card-header">
                    <h4>category detail
                    <a href="{{url('admin/report/create/category')}}" class="btn btn-primary float-end">add category</a>
                </h4>
                </div>
                <div class="card-body">
                    <table class="table talbe-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->category_name}}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mb-4">
    <div class="row">
        <div class="col-md-12">
            

            <div class="card">
                <div class="card-header">
                    <h4>product details
                    <a href="{{url('admin/report/create/product')}}" class="btn btn-primary float-end">add products</a>
                </h4>
                </div>
                <div class="card-body">
                    <table class="table talbe-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Product Name</th>
                                <th>price</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->category->category_name}}</td>
                                    <td>{{$item->product_name}}</td>
                                    <td>₱{{$item->price}}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mb-4">
    <div class="row">
        <div class="col-md-12">
           

            <div class="card">
                <div class="card-header">
                    <h4>product details
                    <a href="{{url('admin/report/create/sale')}}" class="btn btn-primary float-end">add sale</a>
                </h4>
                </div>
                <div class="card-body">
                    <table class="table talbe-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category type</th>
                                <th>product name</th>
                                <th>product price</th>
                                <th>Qualit sold</th>
                                <th>Total Sale</th>
                                <th>Date of Sale</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->product->category->category_name}}</td>
                                    <td>{{$item->product->product_name}}</td>
                                    <td>{{ $item->product->price }}</td>
                                    <td>{{$item->quantity_sold}}</td>
                                    <td>₱{{$item->total_sale}}</td>
                                    <td>{{$item->sale_date}}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection