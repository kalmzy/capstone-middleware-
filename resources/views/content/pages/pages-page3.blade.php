@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Quality Control')
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


      <!-- Profit last month -->
      <div class="row">
      <div class="col-6 mb-4">
        <div class="card">
          <div class="card-header pb-0">
            <h5 class="card-title mb-0"></h5>
            <small class="text-muted"></small>
          </div>
          <div class="card-body">
            <div id="profitLastMonth"></div>
            <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
              <h4 class="mb-0">624k</h4>
              <small class="text-success">+8.24%</small>
            </div>
          </div>
        </div>
      </div>

      <div class="col-6 mb-4">
        <div class="card">
          <div class="card-header pb-0">
            <h5 class="card-title mb-0"></h5>
            <small class="text-muted"></small>
          </div>
          <div class="card-body">
            <div id="defects"></div>
            <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
              <h4 class="mb-0">624k</h4>
              <small class="text-success">+8.24%</small>
            </div>
          </div>
        </div>
      </div>
      </div>
 
  <!-- Yearly Predictive Statistics -->
  <div class="col-9 ">
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

@section('scripts')

@endsection
