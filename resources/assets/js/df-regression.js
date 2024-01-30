// scatter-chart.js

// Get data from JSON endpoint
fetch('/api/sales')
  .then(response => response.json())
  .then(data => {
    // Convert data to arrays
    var xValues = data.xValues;
    var yValues = data.yValues;
    var monthNames = [
        'Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 
        'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'
    ];

    var currentYear = 2024;

    var labels = xValues.map((month, index) => {
        var monthIndex = (month - 1 + 12) % 12;

        if (monthIndex === 0) {
            currentYear++; 
        }

        return monthNames[monthIndex] + ' ' + currentYear;
    });

    // Create chart
    const ctx = document.getElementById('Scat').getContext('2d');
    const scatterChart = new Chart(ctx, {
      type: 'scatter',
      data: {
        labels: labels,
        datasets: [{
          label: 'Actual Data',
          data: xValues.map((value, index) => ({ x: value, y: yValues[index] })),
          borderColor: 'rgba(75, 192, 192, 1)',
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          pointRadius: 5,
        },
        {
            label: 'Regression Line',
            data: data.regressionLine, // Replace with your regression line data
            borderColor: 'rgba(255, 99, 132, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            fill: false,
            showLine: true,
        }]
      },
      options: {
        responsive: true, // Make the chart responsive
        maintainAspectRatio: false, 
        scales: {
          x: {
            type: 'category',
            position: 'bottom',
            grid: {
                color: 'rgba(100, 100, 100, 1)',
                drawBorder: false,
                borderColor: 'rgba(100, 100, 100, 1)'
              },
          },
          y: {
            type: 'linear',
            position: 'left',
            title: {
              display: true,
              text: 'Sale'
            },
            grid: {
                color: 'rgba(100, 100, 100, 1)',
                drawBorder: false,
                borderColor: 'rgba(100, 100, 100, 1)'
              },
          }
        },
      }
    });
  });
