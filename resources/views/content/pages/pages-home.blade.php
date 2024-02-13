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
<script src="{{ asset('assets/js/df-regression.js') }}"></script>
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
  <div class="col-lg-6 mb-4">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title mb-0 pl-0 pl-sm-2 p-2">Latest Defect Statistics</h5>
        <div class="card-action-element ms-auto py-0">
          <div class="dropdown">
            <button type="button" class="btn dropdown-toggle p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-calendar"></i></button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Monthly</a></li>
              <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center">Yearly</a></li>
          </div>
        </div>
      </div>
      <div class="card-body">
        <canvas id="defectChart"></canvas>
      </div>
      </div>
    </div>
  <!-- Reasons for delivery exceptions -->
  <div class="card col-lg-6 mb-4">
    <div class="card-header header-elements">
    </div>
    <div class="card-body pt-2">
        <canvas id="Scat" height="400"></canvas>
    </div>
  </div>
  <!--/ Reasons for delivery exceptions -->
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
          //bar chart     
          const fixedColors = ['#ff3333', '#00cc00', '#7367f0', '#cccc00', '#339999','#ff9f43','#ff8533','#3385ff'];

var defectData = @json($defectCountByCategoryAndMonth);
var ctx = document.getElementById('defectChart').getContext('2d');
var chartHeight = 384; // Adjust this value according to your preference

// Set the canvas height dynamically
ctx.canvas.height = chartHeight;
var defectChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: Object.keys(defectData[Object.keys(defectData)[0]])
            .map(month => month.substring(5, 7) + '-' + month.substring(0, 4)),
        datasets: Object.keys(defectData).map(function(key, index) {
            return {
                label: key,
                data: Object.values(defectData[key]),
                backgroundColor: fixedColors[index % fixedColors.length], // Use fixed colors from the array
                borderColor: 'transparent',
                borderWidth: 1,
                borderRadius: {
                    topRight: 15,
                    topLeft: 15
                }
            };
        })
    },
    options: {
        responsive: true, // Make the chart responsive
        maintainAspectRatio: false, // Allow the chart to not maintain aspect ratio
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        if (value % 1 === 0) {
                            return value;
                        }
                    }
                }
            }
        },
        plugins: {
            legend: {
                show: true,
                position: 'bottom',
                offsetY: 10,
                markers: {
                    width: 8,
                    height: 8,
                    offsetX: -3
                },
                itemMargin: {
                    horizontal: 15,
                    vertical: 5
                },
                fontSize: '13px',
                fontFamily: 'Public Sans',
                fontWeight: 400,
                labels: {
                    colors: '#c4c9e2',
                    useSeriesColors: false,
                    boxWidth: 12, // Adjust the size as needed
                    usePointStyle: true, // Use point style for legend color boxes
                    boxRadius: 10 // Make legend color boxes round
                }
            }
        }
    }
});
</script>
@endsection
