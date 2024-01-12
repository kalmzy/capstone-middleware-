@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Page 2')
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
@section('content')
  <!-- Yearly Predictive Statistics -->
  <div class="h-100">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <div class="card-title mb-0">
          <h5 class="m-0 me-2">Yearly Predictive Statistics</h5>
          <small class="text-muted">Product Sales</small>
        </div>
      </div>
      <div class="card-body">
        <div id="shipmentStatisticsChart"></div>
      </div>
    </div>
  </div>

@endsection
