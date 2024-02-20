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
<style>

    .custom-input {
        position: relative;
        width: 150px; /* Adjust the width as needed */
        margin: 10px;
    }

    .custom-input label {
        position: absolute;
        top: -10px; /* Adjust the top position to move the label inside the border */
        left: 5px; /* Adjust the left position to position the label */
        background-color: white;
        padding: 0 3px;
        font-size: 12px;
        color: #999;
    }

    .custom-input input {
        border: 1px solid #ccc;
        padding: 10px;
        width: 100%;
        background: transparent;
    }
</style>

<form id="dateFilterForm" >

    <div class="row mb-2">
    <div class="form-group col-lg-2  ">
        <div class="custom-input">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" required>
        </div>
    </div>

    <div class="form-group  col-lg-2 ">
        <div class="custom-input">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" required>
        </div>
    </div>
    </div>
</form>

<div class="card  mb-4">
    <div class="card-header header-elements">
    </div>
    <div class="card-body pt-2">
        <canvas id="Scat" height="400"></canvas>
    </div>
  </div>

  <div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Regression Chart</h2>
            <div id="regression-chart"></div>
        </div>
        <div class="col-md-6">
            <h2>Regression Data</h2>
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