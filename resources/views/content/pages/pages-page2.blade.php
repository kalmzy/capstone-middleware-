@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('vendor-style')

<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />

@endsection

@section('vendor-script')

@endsection

@section('page-script')
<script src="{{ asset('assets/js/df-regression.js') }}"></script>
<script src="{{asset('assets/js/app-logistics-dashboard.js')}}"></script>
@endsection
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@section('title', 'Demand Forecasting')

@section('content')

<div class="container">
    <div class="row justify-content-center"> <!-- Added classes -->
        <div class="col-md-10">
            <div class="card mb-7">
                <div class="card-header header-elements">
                        <div class="col-md-6">
                            <h3>Demand Forecasting</h3>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <div class="form-group mb-0">
                                <form method="get" action="">
                                    <div class="input-group">
                                        <label for="product" class="visually-hidden">Select product:</label>
                                        <select class="form-select form-select-sm" id="product" name="product" onchange="this.form.submit()">
                                            <option value="0">Select product</option>
                                            @foreach($products as $product)
                                                <option value="" {{$product ->id}}>{{ $product->product_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
                <div class="card-body pt-2">
                    <canvas id="Scat" height="400"></canvas>
                </div>
            </div>
        </div>
    

        <div class="col-md-2">
            <h4>Regression Data</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Total Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        <tr>
                            <td>{{ $sale->created_at->format('F Y') }}</td>
                            <td>{{ $sale->total_quantity }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>Next Month (Predicted)</td>
                        <td>{{ $predictedNextMonthSales }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection