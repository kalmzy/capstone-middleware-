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
@section('title', 'Home')

@section('content')

<div class="row">
  <!-- First Card Section -->
  <div class="col-md-6 mb-4">
    <div class="card bg-transparent shadow-none border-0">
      <div class="card-body row p-0 pb-2">
        <div class="col-12 card-separator">
          <h4>Welcome To Dashboard </h4>
          <div class="col-12 col-lg-7">
            <p>This is the Overview of the Demand Forecasting and Quality Control!</p>
          </div>
          <div class="d-flex justify-content flex-wrap gap-5 me-3">
            <div class="d-flex align-items-center gap-2 me-3 me-sm-0">
            <a href="{{ route('pages-page-2') }}" class="card-link d-flex align-items-center">
              <span class="bg-label-primary p-1 rounded">
              <i class="ti ti-chart-area-line-filled"></i>
              </span>
            </a>
              <div class="content-right">
                <p class="mb-0">Demand Forecasting</p>
                <h5 class="text-primary mb-0">Click me!</h5>
              </div>
            </div>
            <div class="d-flex align-items-center gap-2">
            <a href="{{ route('pages-page-3') }}" class="card-link d-flex align-items-center">
              <span class="bg-label-info p-1 rounded">
              <i class="ti ti-device-desktop-analytics"></i>
              </span>
            </a>
              <div class="content-right">
                <p class="mb-0">Quality Control</p>
                <h5 class="text-info mb-0">Click me!</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Second Card Section -->
  <div class="col-md-6 mb-4">
    <div class="row">
      <div class="col-sm-7 col-lg-6 mb-4">
        <div class="card card-border-shadow-warning">
          <div class="card-body">
            <div class="d-flex align-items-center mb-2 pb-1">
              <div class="avatar me-2">
                <span class="avatar-initial rounded bg-label-warning"><i class='ti ti-alert-triangle ti-md'></i></span>
              </div>
              <h4 class="ms-1 mb-0">30</h4>
            </div>
            <p class="mb-1">Product With Defects</p>
            <p class="mb-0">
              <span class="fw-medium me-1">-8.7%</span>
              <small class="text-muted">than last week</small>
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-7 col-lg-6 mb-4">
        <div class="card card-border-shadow-danger">
          <div class="card-body">
            <div class="d-flex align-items-center mb-2 pb-1">
              <div class="avatar me-2">
                <span class="avatar-initial rounded bg-label-danger"><i class='ti ti-git-fork ti-md'></i></span>
              </div>
              <h4 class="ms-1 mb-0">27</h4>
            </div>
            <p class="mb-1">Product Under Inspection</p>
            <p class="mb-0">
              <span class="fw-medium me-1">+4.3%</span>
              <small class="text-muted">than last week</small>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
 <!-- Statistics -->
 <div class="col-lg-6 mb-4">
    <div class="card h-100">
      <div class="card-header">
        <div class="d-flex justify-content-between mb-3">
          <h5 class="card-title mb-0">Statistics</h5>
          <small class="text-muted">Updated 1 month ago</small>
        </div>
      </div>
      <div class="card-body">
        <div class="row gy-3">
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-primary me-3 p-2"><i class="ti ti-chart-pie-2 ti-sm"></i></div>
              <div class="card-info">
                <h5 class="mb-0">230k</h5>
                <small>Sales</small>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-danger me-3 p-2"><i class="ti ti-shopping-cart ti-sm"></i></div>
              <div class="card-info">
                <h5 class="mb-0">1.423k</h5>
                <small>Products</small>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-success me-3 p-2"><i class="ti ti-currency-dollar ti-sm"></i></div>
              <div class="card-info">
                <h5 class="mb-0">$9745</h5>
                <small>Revenue</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Statistics -->

<!-- Revenue Growth -->
<div class="col-lg-6 mb-4">
   <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div class="d-flex flex-column">
            <div class="card-title mb-auto">
              <h5 class="mb-1 text-nowrap">Revenue Growth</h5>
              <small>Weekly Report</small>
            </div>
            <div class="chart-statistics">
              <h3 class="card-title mb-1">$4,673</h3>
              <span class="badge bg-label-success">+15.2%</span>
            </div>
          </div>
          <div id="revenueGrowth"></div>
        </div>
      </div>
    </div>
  </div>
  </div>



  <div class="row">
  <!-- Yearly Predictive Statistics -->
  <div class="col-lg-6">
    <div class="card h-100">
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

  <!-- Reasons for delivery exceptions -->
  <div class="col-lg-6">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <div class="card-title mb-0">
          <h5 class="m-0 me-2">Reasons for delivery exceptions</h5>
        </div>
        <div class="dropdown">
          <button class="btn p-0" type="button" id="deliveryExceptions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ti ti-dots-vertical"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="deliveryExceptions">
            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
            <a class="dropdown-item" href="javascript:void(0);">Share</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div id="deliveryExceptionsChart" class="pt-md-4"></div>
      </div>
    </div>
  </div>
  <!--/ Reasons for delivery exceptions -->
</div>
@endsection
