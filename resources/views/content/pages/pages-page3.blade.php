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
  <div class="row">
    <div class="col-sm-6 col-lg-3 mb-4">
      <div class="card h-100">
        <div class="card-body ">
          <br><br><br>
          <div class="d-flex align-items-center mb-2 pb-1">
            <div class="avatar me-2">
              <span class="avatar-initial rounded bg-label-warning"><i class="ti ti-brand-speedtest"></i></span>
            </div>
            <h4 class="ms-1 mb-0">Severity Level</h4>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between">
              <div>
                <div class="badge bg-label-success me-3 rounded p-2">
                  LOW :
                </div>
              </div>
              <div class="text-end">
                <span>{{$Low}}</span>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <div>
                <div class="badge bg-label-warning me-3 rounded p-2">
                  MEDIUM :
                </div>
              </div>
              <div class="text-end">
                <span>{{$Medium}}</span>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <div>
                <div class="badge bg-label-danger me-3 rounded p-2">
                  CRITICAL :
                </div>
              </div>
              <div class="text-end">
                <span >{{$Critical}}</span>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-3 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <br><br><br>
          <div class="d-flex align-items-center mb-2 pb-1">
            <div class="avatar me-2">
              <span class="avatar-initial rounded bg-label-warning"><i class="ti ti-settings-exclamation"></i></span>
            </div>
            <h4 class="ms-1 mb-0">Most Defectives</h4>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between">
              <div>
                <div class="badge bg-label-danger me-3 rounded p-2">
                  product 1 :
                </div>    
              </div>
              <div class="text-end">
                <span >30defect</span>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <div>
                <div class="badge bg-label-danger me-3 rounded p-2">
                  product 2 :
                </div>
              </div>
              <div class="text-end">
                <span >30defect</span>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <div>
                <div class="badge bg-label-danger me-3 rounded p-2">
                  product 3 :
                </div>
              </div>
              <div class="text-end">
                <span >30defect</span>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-6 mb-4">
      <div class="card h-100">
        <div class="card-header header-elements">
          <div>
            <h5 class="card-title mb-0">Statistics</h5>
            <small class="text-muted">Commercial networks and enterprises</small>
          </div>
        </div>
        <div class="card-body pt-2">
          <div id="lineChart"></div>
        </div>
      </div>
    </div>
  </div>



      

 
    <div class="row">
      <div class="col-md-9">
        <div class="card">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-0 pl-0 pl-sm-2 p-2">Latest Defect Statistics</h5>
            <div class="card-action-element ms-auto py-0">
              <div class="dropdown">
                <button type="button" class="btn dropdown-toggle p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-calendar"></i></button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" id="monthlyOption">Monthly</a></li>
                  <li><a href="javascript:void(0);" class="dropdown-item d-flex align-items-center" id="yearlyOption">Yearly</a></li>
              </ul>
              
              </div>
            </div>
          </div>
          <div class="card-body">
            <canvas id="defectChart"></canvas>
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

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


        <script>
          //defect metrics
          document.addEventListener("DOMContentLoaded", function(event) {
            var defectCounts = {!! json_encode($defectCountByCategory) !!};
        
            var options = {
              chart: {
                type: 'donut',
                parentHeightOffset: 0,
                height: 500
              },
              labels: ['Dimension', 'Packaging', 'Surface', 'Material', 'Functional', 'Assembly', 'Aesthetic', 'Labeling'],
              series: [defectCounts.dimension, defectCounts.packaging, defectCounts.surface, defectCounts.material, defectCounts.functional, defectCounts.assembly, defectCounts.aesthetic, defectCounts.labeling],
              colors: [
                '#28c76f',
                '#26c06b',
                '#22aa5f',
                '#1d9553',
                '#198047',
                '#156a3b',
                '#115530',
                '#0d4024'
              ],
              stroke: {
        width: 0
      },
              dataLabels: {
                enabled: false,
                formatter: function (val, opt) {
                  return parseInt(val, 10) + '%';
                }
              },
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
                  useSeriesColors: false
                }
              },
              tooltip: {
        theme: false
      },
      grid: {
        padding: {
          top: 15
        }
      },
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        }
      },
              plotOptions: {
                pie: {
                  donut: {
                    size: '80%',
                    labels: {
                      show: true,
                      value: {
                fontSize: '26px',
                fontFamily: 'Public Sans',
                color: '#c4c9e2',
                fontWeight: 500,
                offsetY: -30,
                formatter: function (val) {
                  return parseInt(val) + '%';
                }
              },
                      name: {
                        offsetY: 20,
                        fontFamily: 'Public Sans'
                      },
                      total: {
                        show: true,
                        fontSize: '1rem',
                        color: '#7983bb',
                        label: 'Defects Rates',
                        formatter: function () {
                          var total = defectCounts.dimension + defectCounts.packaging + defectCounts.surface + defectCounts.material + defectCounts.functional + defectCounts.assembly + defectCounts.aesthetic + defectCounts.labeling;
                          return ((defectCounts.dimension / total) * 100).toFixed(2) + '%';
                        }
                      }
                    }
                  }
                }
              },
              responsive: [
        {
          breakpoint: 420,
          options: {
            chart: {
              height: 360
            }
          }
        }
      ]
              
            };
        
            var chart = new ApexCharts(document.querySelector("#donutChart"), options);
            chart.render();
          });



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
        labels: Object.keys(defectData[Object.keys(defectData)[0]]),
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


<script>
  document.addEventListener('DOMContentLoaded', function() {
      const lineChartEl = document.querySelector('#lineChart');

      const months = @json($months);
  const totals = @json($totals);

      const lineChartConfig = {
          chart: {
              height: 250,
              type: 'line',
              parentHeightOffset: 0,
              zoom: {
                  enabled: false
              },
              toolbar: {
                  show: false
              }
          },
          series: [{
              data: totals
          }],
          markers: {
size: 6, // Adjust the size of the circles
fillColor: '#ff0000', // Set the fill color of the circles (e.g., red)
strokeColors: 'transparent',
strokeWidth: 3.2,
hover: {
  size: 5.5
}
},
          dataLabels: {
              enabled: false
          },
          stroke: {
              curve: 'straight',
              width: 3 
          },
          colors: ['#ffbb44'],
          grid: {
            strokeDashArray: 5,
              xaxis: {
                  lines: {
                      show: false
                  }
              },
              padding: {
                  top: -20
              }
          },
          tooltip: {
              custom: function ({ series, seriesIndex, dataPointIndex, w }) {
                  return '<div class="px-2 py-1">' + '<span>' + series[seriesIndex][dataPointIndex] + '</span>' + '</div>';
              }
          },
          xaxis: {
              categories: months,
              axisBorder: {
                  show: false
              },
              axisTicks: {
                  show: false
              },
              labels: {
                  style: {
                      colors: '#777',
                      fontSize: '13px'
                  }
              }
          },
          yaxis: {
              labels: {
                  style: {
                      colors: '#777',
                      fontSize: '13px'
                  }
              }
          },
          responsive: [{
        breakpoint: 768, // Breakpoint at which responsiveness should be applied
        options: {
            chart: {
                height: 200 // Adjust height for smaller screens
            }
        }
    }]
      };

      if (typeof lineChartEl !== 'undefined' && lineChartEl !== null) {
          const lineChart = new ApexCharts(lineChartEl, lineChartConfig);
          lineChart.render();
      }
  });
</script>

@endsection
