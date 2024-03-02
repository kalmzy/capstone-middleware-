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
                    <h4>product details
                    <a href="{{url('admin/report/create/product')}}" class="btn btn-primary float-end">add products</a>
                </h4>
                </div>
                <div class="card-body">
                    <table class="table talbe-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>price</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>₱{{$item->unit_price}}</td>
                                    
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
                    <h4>sale details
                    <a href="{{url('admin/report/create/sale')}}" class="btn btn-primary float-end">add sale</a>
                </h4>
                </div>
                <div class="card-body">
                    <table class="table talbe-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
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
                                    <td>{{$item->product->name}}</td>
                                    <td>{{ $item->product->unit_price }}</td>
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





<div class="container col-6 mb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table talbe-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Predicted Month</th>
                                <th>Quantity Prediction</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prediction as $item)
                                <tr>
                                    
                                    <td>{{$item->id}}</td>
                                    <td>{{ $prediction->id }}</td>
                                    <td>{{ date('F', strtotime('2024-' . $item->month . '-01')) }}</td>
                                    <td>{{$item->predicted_sales}}</td>
                                    
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