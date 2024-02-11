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
                        @if($selectedProduct)
                        <tr>
                            <td>{{ $selectedProduct->product_name }}</td>
                            <td>{{ $selectedProduct->price }}</td>
                            <td>{{ $selectedProduct->created_at }}</td>
                          
                        </tr>
                    @endif
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

@endsection