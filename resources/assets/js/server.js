// Quality statistics Chart
  // --------------------------------------------------------------------
  const qualityEl = document.querySelector('#qualityStatisticsChart'),
  qualityConfig = {
    series: [
      {
        name: 'Shipment',
        type: 'line',
        data: [38, 45, 33, 38, 32, 50, 48, 40, 42, 37, 32, 12]
      },
      {
        name: 'Delivery',
        type: 'line',
        data: [23, 28, 23, 32, 28, 44, 32, 38, 26, 34, 35, 17]
      }
    ],
    chart: {
      height: 300,
      type: 'line',
      stacked: false,
      parentHeightOffset: 0,
      toolbar: {
        show: false
      },
      zoom: {
        enabled: false
      }
    },
    markers: {
      size: 4,
      colors: [config.colors.white],
      strokeColors: chartColors.line.series2,
      hover: {
        size: 6
      },
      borderRadius: 4
    },
    stroke: {
      curve: 'smooth',
      width: [0, 3],
      lineCap: 'round'
    },
    legend: {
      show: true,
      position: 'bottom',
      markers: {
        width: 8,
        height: 8,
        offsetX: -3
      },
      height: 40,
      offsetY: 10,
      itemMargin: {
        horizontal: 10,
        vertical: 0
      },
      fontSize: '15px',
      fontFamily: 'Public Sans',
      fontWeight: 400,
      labels: {
        colors: headingColor,
        useSeriesColors: false
      },
      offsetY: 10
    },
    grid: {
      strokeDashArray: 8
    },
    colors: [chartColors.line.series1, chartColors.line.series2],
    fill: {
      opacity: [1, 1]
    },
    plotOptions: {
      bar: {
        columnWidth: '30%',
        startingShape: 'rounded',
        endingShape: 'rounded',
        borderRadius: 4
      }
    },
    dataLabels: {
      enabled: false
    },
    xaxis: {
      tickAmount: 10,
      categories: ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
      labels: {
        style: {
          colors: labelColor,
          fontSize: '13px',
          fontFamily: 'Public Sans',
          fontWeight: 400
        }
      },
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      }
    },
    yaxis: {
      tickAmount: 4,
      min: 10,
      max: 50,
      labels: {
        style: {
          colors: labelColor,
          fontSize: '13px',
          fontFamily: 'Public Sans',
          fontWeight: 400
        },
        formatter: function (val) {
          return val + '%';
        }
      }
    },
    responsive: [
      {
        breakpoint: 1400,
        options: {
          chart: {
            height: 270
          },
          xaxis: {
            labels: {
              style: {
                fontSize: '10px'
              }
            }
          },
          legend: {
            itemMargin: {
              vertical: 0,
              horizontal: 10
            },
            fontSize: '13px',
            offsetY: 12
          }
        }
      },
      {
        breakpoint: 1399,
        options: {
          chart: {
            height: 415
          },
          plotOptions: {
            bar: {
              columnWidth: '50%'
            }
          }
        }
      },
      {
        breakpoint: 982,
        options: {
          plotOptions: {
            bar: {
              columnWidth: '30%'
            }
          }
        }
      },
      {
        breakpoint: 480,
        options: {
          chart: {
            height: 250
          },
          legend: {
            offsetY: 7
          }
        }
      }
    ]
  };
if (typeof qualityEl !== undefined && qualityEl !== null) {
  const quality = new ApexCharts(qualitytEl, qualityConfig);
  quality.render();
}
'use strict';

(function () {
  let labelColor, headingColor;

  if (isDarkStyle) {
    labelColor = config.colors_dark.textMuted;
    headingColor = config.colors_dark.headingColor;
  } else {
    labelColor = config.colors.textMuted;
    headingColor = config.colors.headingColor;
  }

  // Chart Colors
  const chartColors = {
    donut: {
      series1: config.colors.success,
      series2: '#28c76fb3',
      series3: '#28c76f80',
      series4: config.colors_label.success
    },
    line: {
      series1: config.colors.warning,
      series2: config.colors.primary,
      series3: '#7367f029'
    }
  };
// Quality statistics Chart
  // --------------------------------------------------------------------
  const qualityEl = document.querySelector('#qualityStatisticsChart'),
  qualityConfig = {
    series: [
      {
        name: 'Shipment',
        type: 'line',
        data: [38, 45, 33, 38, 32, 50, 48, 40, 42, 37, 32, 12]
      },
      {
        name: 'Delivery',
        type: 'line',
        data: [23, 28, 23, 32, 28, 44, 32, 38, 26, 34, 35, 17]
      }
    ],
    chart: {
      height: 300,
      type: 'line',
      stacked: false,
      parentHeightOffset: 0,
      toolbar: {
        show: false
      },
      zoom: {
        enabled: false
      }
    },
    markers: {
      size: 4,
      colors: [config.colors.white],
      strokeColors: chartColors.line.series2,
      hover: {
        size: 6
      },
      borderRadius: 4
    },
    stroke: {
      curve: 'smooth',
      width: [0, 3],
      lineCap: 'round'
    },
    legend: {
      show: true,
      position: 'bottom',
      markers: {
        width: 8,
        height: 8,
        offsetX: -3
      },
      height: 40,
      offsetY: 10,
      itemMargin: {
        horizontal: 10,
        vertical: 0
      },
      fontSize: '15px',
      fontFamily: 'Public Sans',
      fontWeight: 400,
      labels: {
        colors: headingColor,
        useSeriesColors: false
      },
      offsetY: 10
    },
    grid: {
      strokeDashArray: 8
    },
    colors: [chartColors.line.series1, chartColors.line.series2],
    fill: {
      opacity: [1, 1]
    },
    plotOptions: {
      bar: {
        columnWidth: '30%',
        startingShape: 'rounded',
        endingShape: 'rounded',
        borderRadius: 4
      }
    },
    dataLabels: {
      enabled: false
    },
    xaxis: {
      tickAmount: 10,
      categories: ['Jan', 'Feb', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
      labels: {
        style: {
          colors: labelColor,
          fontSize: '13px',
          fontFamily: 'Public Sans',
          fontWeight: 400
        }
      },
      axisBorder: {
        show: false
      },
      axisTicks: {
        show: false
      }
    },
    yaxis: {
      tickAmount: 4,
      min: 10,
      max: 50,
      labels: {
        style: {
          colors: labelColor,
          fontSize: '13px',
          fontFamily: 'Public Sans',
          fontWeight: 400
        },
        formatter: function (val) {
          return val + '%';
        }
      }
    },
    responsive: [
      {
        breakpoint: 1400,
        options: {
          chart: {
            height: 270
          },
          xaxis: {
            labels: {
              style: {
                fontSize: '10px'
              }
            }
          },
          legend: {
            itemMargin: {
              vertical: 0,
              horizontal: 10
            },
            fontSize: '13px',
            offsetY: 12
          }
        }
      },
      {
        breakpoint: 1399,
        options: {
          chart: {
            height: 415
          },
          plotOptions: {
            bar: {
              columnWidth: '50%'
            }
          }
        }
      },
      {
        breakpoint: 982,
        options: {
          plotOptions: {
            bar: {
              columnWidth: '30%'
            }
          }
        }
      },
      {
        breakpoint: 480,
        options: {
          chart: {
            height: 250
          },
          legend: {
            offsetY: 7
          }
        }
      }
    ]
  };
if (typeof qualityEl !== undefined && qualityEl !== null) {
  const quality = new ApexCharts(qualitytEl, qualityConfig);
  quality.render();
}
})();
