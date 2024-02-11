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

<div class="container">
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
 

 
    <div class="row">
      <div class="col-md-9">
        <!-- Bar chart -->
        <div class="card">
          <div class="card-header d-flex align-items-center justify-content-between">
            <div class="card-title mb-0">
              <h5 class="m-0 me-2">Product Defects Statistics</h5>
              <small class="text-muted">Total Defects</small>
            </div>
            <div class="dropdown">
              <button type="button" class="btn btn-label-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">January</button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="javascript:void(0);">Months</a></li>
                <li><a class="dropdown-item" href="javascript:void(0);">Years</a></li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <div id="shipmentStatisticsChart"></div>
          </div>
        </div>
      </div>
    
      <div class="col-md-3">
        <!-- Donut chart -->
        <div class="card">
          <div class="card-header">
            <h5 class="m-0 me-2">Defects Rates</h5>
          </div>
          <div class="card-body">
            <div id="donutChart" class="pt-md-4" style="width: 100%; height: 400px;"></div>
          </div>
        </div>
      </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
          document.addEventListener("DOMContentLoaded", function(event) {
            var defectCounts = {!! json_encode($defectCountByCategory) !!};
        
            var options = {
              chart: {
                type: 'donut',
                height: 500,
              },
              labels: ['Dimension', 'Packaging', 'Surface', 'Material', 'Functional', 'Assembly', 'Aesthetic', 'Labeling'],
              series: [defectCounts.dimension, defectCounts.packaging, defectCounts.surface, defectCounts.material, defectCounts.functional, defectCounts.assembly, defectCounts.aesthetic, defectCounts.labeling],
              colors: [
                '#008FFB',
                '#00E396',
                '#FEB019',
                '#FF4560',
                '#775DD0',
                '#3F51B5',
                '#546E7A',
                '#D7263D'
                // Add more colors as needed
              ],
              dataLabels: {
                enabled: true,
                formatter: function (val, opt) {
                  return parseInt(val, 10) + '%';
                }
              },
              legend: {
                show: true,
                position: 'bottom',
                markers: { offsetX: -3 },
                itemMargin: {
                  vertical: 3,
                  horizontal: 10
                },
                
                labels: {
                  colors: '#777',
                }
              },
              plotOptions: {
                pie: {
                  donut: {
                    labels: {
                      show: true,
                      name: {
                        fontSize: '2rem',
                        fontFamily: 'Public Sans'
                      },
                      value: {
                        fontSize: '1.2rem',
                        color: '#777',
                        fontFamily: 'Public Sans',
                        formatter: function (val) {
                          return parseInt(val, 10) + '%';
                        }
                      },
                      total: {
                        show: true,
                        fontSize: '1.5rem',
                        color: '#333',
                        label: '',
                        formatter: function () {
                          var total = defectCounts.dimension + defectCounts.packaging + defectCounts.surface + defectCounts.material + defectCounts.functional + defectCounts.assembly + defectCounts.aesthetic + defectCounts.labeling;
                          return ((defectCounts.dimension / total) * 100).toFixed(2) + '%';
                        }
                      }
                    }
                  }
                }
              }
            };
        
            var chart = new ApexCharts(document.querySelector("#donutChart"), options);
            chart.render();
          });
        </script>
</div>        
@endsection

@section('scripts')

@endsection
