@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('vendor-style')

<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />

@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/chartjs/chartjs.js')}}"></script>
<script src="assets/vendor/libs/sortablejs/sortable.js" ></script>/>
<script src="../../assets/vendor/libs/apex-charts/apexcharts.js"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/app-logistics-dashboard.js')}}"></script>
<script src="{{asset('assets/js/charts-chartjs.js')}}"></script>
<script src="{{asset('assets/js/cards-analytics.js')}}"></script>
<script src="../../assets/js/main.js"></script>
<script src="../../assets/js/cards-statistics.js"></script>
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
    @csrf
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

  <!--Line Chart-->
  <div class="card  ">
  <div class="card-header header-elements">
    <div>
      <h5 class="card-title mb-0">Monthly Predictive Statistics</h5>
      <small class="text-muted">Product Sales</small>
    </div>
    <div class="card-header-elements ms-auto py-0">
      <h5 class=" mb-0 me-3"></h5>
      <span class="badge bg-label-secondary">
        <i class='ti ti-arrow-up ti-xs text-success'></i>
        <span class="align-middle"></span>
      </span>
      <div class="dropdown">
      <button type="button" class="btn dropdown-toggle p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-calendar"></i></button>
      <ul class="dropdown-menu dropdown-menu-end">
      <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" id="monthly">Monthly</a></li>
<li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" id="yearly">Yearly</a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
      </ul>
    </div>
    </div>
  </div>
  <div class="card-body pt-2">
    <canvas id="lineChart" class="chartjs" data-height="500"></canvas>
  </div>
</div>

<h1>Linear Regression Result</h1>
<p>Slope: {{ $slope }}</p>
<p>Intercept: {{ $intercept }}</p>

<canvas id="Scat" height="100"></canvas>

<script>
    var ctx = document.getElementById('Scat').getContext('2d');
    var xValues = {!! json_encode($xValues) !!};
    var yValues = {!! json_encode($yValues) !!};
    var regressionLine = {!! json_encode($regressionLine) !!};

    // Array of month names
    var monthNames = [
        'January', 'February', 'March', 'April', 'May', 'June', 
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    var currentYear = 2023;

    var labels = xValues.map((month, index) => {
        var monthIndex = (month - 1 + 12) % 12;

        if (monthIndex === 0) {
            currentYear++; 
        }

        return monthNames[monthIndex] + ' ' + currentYear;
    });

    var scatterChart = new Chart(ctx, {
        type: 'scatter',
        data: {
            labels: labels, // Use month and year as labels
            datasets: [{
                label: 'Scatter Plot',
                data: xValues.map((value, index) => ({ x: value, y: yValues[index] })),
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                pointRadius: 5,
            }, {
                label: 'Regression Line',
                data: regressionLine,
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                fill: false,
                showLine: true,
            }]
        },
        options: {
            scales: {
                x: {
                    type: 'category', // Use 'category' for non-numeric labels
                    position: 'bottom',
                    title: {
                        display: true,
                        text: 'Months and Years' // Label for x-axis
                    }
                },
                y: {
                    type: 'linear',
                    position: 'left',
                    title: {
                        display: true,
                        text: 'Amount' // Label for y-axis
                    }
                }
            }
        }
    });
</script>

@endsection
