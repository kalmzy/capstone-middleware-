@extends('layouts/layoutMaster')

@section('title', 'Data Connection')
@section('content')
<div class="row mb-4 mx-auto justify-content-center">
    <div class="col-md-3">
        <div class="form-group">
            <form method="get" action="{{ route('products.filter') }}">
                <div class="input-group">
                    <label for="category" class="visually-hidden">Select category:</label>
                    <select class="form-select" id="category" name="category" onchange="this.form.submit()">
                        <option value="0">Select category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $categoryId == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <form method="get" action="{{ route('products.filter') }}">
                <div class="input-group">
                    <label for="product" class="visually-hidden">Select product:</label>
                    <select class="form-select" id="product" name="product" onchange="this.form.submit()">
                        <option value="0">Select product</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ $selectedProductId == $product->id ? 'selected' : '' }}>{{ $product->product_name }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="table-responsive mb-4">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th class="Hcol">Product</th>
                            <th>Price</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td>{{$item->product_name}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Product Data</th>
                            @foreach(range(1, 12) as $month)
                                <th>{{ date('F', mktime(0, 0, 0, $month, 1)) }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Unit Stock</td>
                            @foreach ($dataWithMissingMonths as $item)
                            @if ($item->total_quantity_sold > 0 || $loop->first)
                              <td>{{ $selectedProduct ? $selectedProduct->price : 0 }}</td>
                            @else
                              <td></td>
                            @endif
                          @endforeach
                          
                        </tr>

                        <tr>
                            <td>price</td>
                            @foreach ($dataWithMissingMonths as $item)
                            @if ($item->total_quantity_sold > 0 || $loop->first)
                              <td>{{ $selectedProduct ? $selectedProduct->price : 0 }}</td>
                            @else
                              <td></td>
                            @endif
                          @endforeach
                          
                        </tr>

                        <tr>
                            <td>Sold Unit</td>
                            @foreach ($dataWithMissingMonths as $item)
                                <td>{{ isset($item->total_quantity_sold) ? $item->total_quantity_sold : 0 }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Revenue</td>
                            @foreach ($dataWithMissingMonths as $item)
                                <td>{{ isset($item->total_amount_sale) ? $item->total_amount_sale : 0 }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container mb-4 mt-4">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4>Sales
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
                                <th>Date of sale</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($psales as $item)
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
        <div class="col-3"> 
            <table class="table">
                <thead>
                    <tr>
                        <th>Year</th>
                        <th>Month</th>
                        <th>Total Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($salesData as $sale)
                    <tr>
                        <td>{{ $sale->year }}</td>
                        <td>{{ $sale->month }}</td>
                        <td>{{ $sale->total_quantity }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>




@endsection