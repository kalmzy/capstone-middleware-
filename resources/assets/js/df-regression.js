// scatter-chart.js

document.addEventListener("DOMContentLoaded", function() {
  // Get data from JSON endpoint
  fetch('/api/sales')
    .then(response => response.json())
    .then(data => {
      // Extract data
      var actualSales = data.sales.map(item => item.total_quantity);
      var predictedNextMonthSales = data.predictedNextMonthSales;
      var regressionLine = data.regressionLine;

      // Extract xValues for actual sales
      var xValues = data.sales.map(item => {
        var date = new Date(item.created_at);
        return date.getMonth() + 1; // Month is zero-indexed in JavaScript Date object
      });

      // Convert xValues to labels
      var monthNames = [
        'Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 
        'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'
      ];
      var currentYear = new Date().getFullYear();
      var labels = xValues.map((month, index) => {
        var monthIndex = (month - 1 + 12) % 12;

        if (monthIndex === 0 && index > 0) {
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
          datasets: [
            {
              label: 'Actual Data',
              data: xValues.map((value, index) => ({ x: value, y: actualSales[index] })),
              borderColor: 'rgba(75, 192, 192, 1)',
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              pointRadius: 5,
            },
            {
              label: 'Regression Line',
              data: regressionLine,
              borderColor: 'rgba(255, 99, 132, 1)',
              backgroundColor: 'rgba(255, 99, 132, 0.2)',
              fill: false,
              showLine: true,
            },
            {
              label: 'Predicted Next Month Sales',
              data: [{ x: xValues[xValues.length - 1], y: predictedNextMonthSales }],
              borderColor: 'rgba(54, 162, 235, 1)',
              backgroundColor: 'rgba(54, 162, 235, 0.2)',
              pointRadius: 5,
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            x: {
              type: 'category',
              position: 'bottom',
              grid: {
                  color: 'gray',
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
                  color: 'gray',
                  drawBorder: false,
                  borderColor: 'rgba(100, 100, 100, 1)'
                },
            }
          },
        }
      });
    });
});
