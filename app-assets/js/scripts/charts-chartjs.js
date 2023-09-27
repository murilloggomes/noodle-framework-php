// /*
// * ChartJS - Chart
// */

// Line chart
// ------------------------------
$(window).on("load", function() {
    //Get the context of the Chart canvas element we want to select
    var ctx = $("#line-chart");
 
    // Chart Options
    var chartOptions = {
       responsive: true,
       maintainAspectRatio: false,
       legend: {
          position: "bottom"
       },
       hover: {
          mode: "label"
       },
       scales: {
          xAxes: [
             {
                display: true,
                gridLines: {
                   color: "#f3f3f3",
                   drawTicks: false
                },
                scaleLabel: {
                   display: true,
                   labelString: "Month"
                }
             }
          ],
          yAxes: [
             {
                display: true,
                gridLines: {
                   color: "#f3f3f3",
                   drawTicks: false
                },
                scaleLabel: {
                   display: true,
                   labelString: "Value"
                }
             }
          ]
       },
       title: {
          display: true,
          text: "Line Chart - Legend"
       }
    };
 
    // Chart Data
    var chartData = {
       labels: ["January", "February", "March", "April", "May", "June", "July"],
       datasets: [
          {
             label: "My First dataset",
             data: [65, 59, 80, 81, 56, 55, 40],
             fill: false,
             borderColor: "#e91e63",
             pointBorderColor: "#e91e63",
             pointBackgroundColor: "#FFF",
             pointBorderWidth: 2,
             pointHoverBorderWidth: 2,
             pointRadius: 4
          },
          {
             label: "My Second dataset",
             data: [28, 48, 40, 19, 86, 27, 90],
             fill: false,
             borderColor: "#03a9f4",
             pointBorderColor: "#03a9f4",
             pointBackgroundColor: "#FFF",
             pointBorderWidth: 2,
             pointHoverBorderWidth: 2,
             pointRadius: 4
          },
          {
             label: "My Third dataset - No bezier",
             data: [45, 25, 16, 36, 67, 18, 76],
             fill: false,
             borderColor: "#ffc107",
             pointBorderColor: "#ffc107",
             pointBackgroundColor: "#FFF",
             pointBorderWidth: 2,
             pointHoverBorderWidth: 2,
             pointRadius: 4
          }
       ]
    };
 
    var config = {
       type: "line",
 
       // Chart Options
       options: chartOptions,
 
       data: chartData
    };
 
    // Create the chart
    var lineChart = new Chart(ctx, config);
 
    // Bar chart
    // ------------
 
    //Get the context of the Chart canvas element we want to select
    var ctx = $("#bar-chart");
 
    // Chart Options
    var chartOptions = {
       // Elements options apply to all of the options unless overridden in a dataset
       // In this case, we are setting the border of each horizontal bar to be 2px wide and green
       elements: {
          rectangle: {
             borderWidth: 2,
             borderColor: "rgb(0, 255, 0)",
             borderSkipped: "left"
          }
       },
       responsive: true,
       maintainAspectRatio: false,
       responsiveAnimationDuration: 500,
       legend: {
          position: "top"
       },
       scales: {
          xAxes: [
             {
                display: true,
                gridLines: {
                   color: "#f3f3f3",
                   drawTicks: false
                },
                scaleLabel: {
                   display: true
                }
             }
          ],
          yAxes: [
             {
                display: true,
                gridLines: {
                   color: "#f3f3f3",
                   drawTicks: false
                },
                scaleLabel: {
                   display: true
                }
             }
          ]
       },
       title: {
          display: false,
          text: "Chart.js Horizontal Bar Chart"
       }
    };
 
    // Chart Data
    var chartData = {
       labels: ["January", "February", "March", "April"],
       datasets: [
          {
             label: "My First dataset",
             data: [65, 59, 80, 81],
             backgroundColor: "#00bcd4",
             hoverBackgroundColor: "#00acc1",
             borderColor: "transparent"
          },
          {
             label: "My Second dataset",
             data: [28, 48, 40, 19],
             backgroundColor: "#ffeb3b",
             hoverBackgroundColor: "#fdd835",
             borderColor: "transparent"
          }
       ]
    };
 
    var config = {
       type: "horizontalBar",
 
       // Chart Options
       options: chartOptions,
 
       data: chartData
    };
 
    // Create the chart
    var barChart = new Chart(ctx, config);
 
    // Radar Chart
    // ------------------
    //Get the context of the Chart canvas element we want to select
    var ctx = $("#radar-chart");
 
    // Chart Options
    var chartOptions = {
       responsive: true,
       maintainAspectRatio: false,
       responsiveAnimationDuration: 500,
       legend: {
          position: "top"
       },
       title: {
          display: true,
          text: "Chart.js Radar Chart"
       },
       scale: {
          reverse: false,
          ticks: {
             beginAtZero: true
          }
       }
    };
 
    // Chart Data
    var chartData = {
       labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
       datasets: [
          {
             label: "My First dataset",
             backgroundColor: "rgba(233,30,99,.4)",
             borderColor: "transparent",
             pointBorderColor: "#e91e63",
             pointBackgroundColor: "#FFF",
             pointBorderWidth: 2,
             pointHoverBorderWidth: 2,
             pointRadius: 4,
             data: [65, 59, 80, 81, 56, 55, 40]
          },
          {
             label: "Hidden dataset",
             hidden: true,
             data: [45, 25, 16, 36, 67, 18, 76]
          },
          {
             label: "My Second dataset",
             backgroundColor: "rgba(29,233,182,.8)",
             borderColor: "transparent",
             pointBorderColor: "#1DE9B6",
             pointBackgroundColor: "#FFF",
             pointBorderWidth: 2,
             pointHoverBorderWidth: 2,
             pointRadius: 4,
             data: [28, 48, 40, 19, 86, 27, 78]
          }
       ]
    };
 
    var config = {
       type: "radar",
 
       // Chart Options
       options: chartOptions,
 
       data: chartData
    };
 
    // Create the chart
    var radarChart = new Chart(ctx, config);
 
    // Polar chart
    // ----------------
    //Get the context of the Chart canvas element we want to select
    var ctx = $("#polar-chart");
 
    // Chart Options
    var chartOptions = {
       responsive: true,
       maintainAspectRatio: false,
       responsiveAnimationDuration: 500,
       legend: {
          position: "top"
       },
       title: {
          display: false,
          text: "Chart.js Polar Area Chart"
       },
       scale: {
          ticks: {
             beginAtZero: true
          },
          reverse: false
       },
       animation: {
          animateRotate: false
       }
    };
 
    // Chart Data
    var chartData = {
       labels: ["January", "February", "March", "April", "May"],
       datasets: [
          {
             data: [65, 59, 80, 81, 56],
             backgroundColor: ["#03a9f4", "#00bcd4", "#ffc107", "#e91e63", "#4caf50"],
             label: "My dataset" // for legend
          }
       ]
    };
 
    var config = {
       type: "polarArea",
 
       // Chart Options
       options: chartOptions,
 
       data: chartData
    };
 
    // Create the chart
    var polarChart = new Chart(ctx, config);
 
    // Pie chart
    // ----------------
    //Get the context of the Chart canvas element we want to select
    var ctx = $("#pie-chart");
 
    // Chart Options
    var chartOptions = {
       responsive: true,
       maintainAspectRatio: false,
       responsiveAnimationDuration: 500
    };
 
    // Chart Data
    var chartData = {
       labels: ["January", "February", "March", "April", "May"],
       datasets: [
          {
             label: "My First dataset",
             data: [65, 59, 80, 81, 56],
             backgroundColor: ["#03a9f4", "#00bcd4", "#ffc107", "#e91e63", "#4caf50"]
          },
          {
             label: "My Second dataset",
             data: [28, 48, 40, 19, 86],
             backgroundColor: ["#03a9f4", "#00bcd4", "#ffc107", "#e91e63", "#4caf50"]
          },
          {
             label: "My Third dataset - No bezier",
             data: [45, 25, 16, 36, 67],
             backgroundColor: ["#03a9f4", "#00bcd4", "#ffc107", "#e91e63", "#4caf50"]
          },
          {
             label: "My Fourth dataset",
             data: [17, 62, 78, 88, 26],
             backgroundColor: ["#03a9f4", "#00bcd4", "#ffc107", "#e91e63", "#4caf50"]
          }
       ]
    };
 
    var config = {
       type: "pie",
 
       // Chart Options
       options: chartOptions,
 
       data: chartData
    };
 
    // Create the chart
    var pieChart = new Chart(ctx, config);
 
    // Doughnut chart
    // -----------------
    //Get the context of the Chart canvas element we want to select
    var ctx = $("#doughnut-chart");
 
    // Chart Options
    var chartOptions = {
       responsive: true,
       maintainAspectRatio: false,
       responsiveAnimationDuration: 500
    };
 
    // Chart Data
    var chartData = {
       labels: ["January", "February", "March", "April", "May"],
       datasets: [
          {
             label: "My First dataset",
             data: [65, 59, 80, 81, 56],
             backgroundColor: ["#03a9f4", "#00bcd4", "#ffc107", "#e91e63", "#4caf50"]
          },
          {
             label: "My Second dataset",
             data: [28, 48, 40, 19, 86],
             backgroundColor: ["#03a9f4", "#00bcd4", "#ffc107", "#e91e63", "#4caf50"]
          },
          {
             label: "My Third dataset - No bezier",
             data: [45, 25, 16, 36, 67],
             backgroundColor: ["#03a9f4", "#00bcd4", "#ffc107", "#e91e63", "#4caf50"]
          },
          {
             label: "My Fourth dataset",
             data: [17, 62, 78, 88, 26],
             backgroundColor: ["#03a9f4", "#00bcd4", "#ffc107", "#e91e63", "#4caf50"]
          }
       ]
    };
 
    var config = {
       type: "doughnut",
 
       // Chart Options
       options: chartOptions,
 
       data: chartData
    };
 
    // Create the chart
    var doughnutChart = new Chart(ctx, config);
 });
 