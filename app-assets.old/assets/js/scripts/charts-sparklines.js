/*
 * Sparkline - Charts
 */
function chartInit() {
  // Bar chart ( New Clients)
  $("#clients-bar").sparkline([70, 80, 65, 78, 58, 80, 78, 80, 70, 50, 75, 65, 80, 70, 65, 90, 65, 80, 70, 65, 90], {
    type: 'bar',
    height: '150',
    width: '100%',
    barWidth: 8,
    barSpacing: 4,
    barColor: '#8bc34a',
    negBarColor: '#689f38',
    zeroColor: '#689f38',
  });

  //clientsBar.setOptions({chartArea: {width: 100}});


  // Line chart ( New Invoice)
  $("#invoice-line").sparkline([5, 6, 7, 9, 9, 5, 3, 2, 2, 4, 6, 7, 5, 6, 7, 9, 9, 5], {
    type: 'line',
    width: '100%',
    height: '150',
    lineWidth: 2,
    lineColor: '#5c6bc0',
    fillColor: 'rgba(159, 168, 218, 1)',
    highlightSpotColor: '#5c6bc0',
    highlightLineColor: '#5c6bc0',
    minSpotColor: '#f44336',
    maxSpotColor: '#4caf50',
    spotColor: '#5c6bc0',
    spotRadius: 4,
    // //tooltipFormat: $.spformat('{{value}}', 'tooltip-class')
  });


  // Tristate chart (Today Profit)
  $("#profit-tristate").sparkline([2, 3, 0, 4, -5, -6, 7, -2, 3, 0, 2, 3, -1, 0, 2, 3, 3, -1, 0, 2, 3], {
    type: 'tristate',
    width: '100%',
    height: '80',
    posBarColor: '#ba68c8',
    negBarColor: '#e1bee7',
    barWidth: 7,
    barSpacing: 4,
    zeroAxis: false,
    //tooltipFormat: $.spformat('{{value}}', 'tooltip-class')
  });

  // Bar + line composite charts (Total Sales)
  $('#sales-compositebar').sparkline([4, 6, 7, 7, 4, 3, 2, 3, 1, 4, 6, 5, 9, 4, 6, 7, 7, 4, 6, 5, 9, 4, 6, 7], {
    type: 'bar',
    barColor: '#F6CAFD',
    height: '130',
    width: '100%',
    barWidth: '7',
    barSpacing: 2,
    //tooltipFormat: $.spformat('{{value}}', 'tooltip-class')
  });
  $('#sales-compositebar').sparkline([4, 1, 5, 7, 9, 9, 8, 8, 4, 2, 5, 6, 7], {
    composite: true,
    type: 'line',
    width: '100%',
    lineWidth: 2,
    lineColor: '#fff3e0',
    fillColor: 'rgba(153,114,181,0.3)',
    highlightSpotColor: '#fff3e0',
    highlightLineColor: '#fff3e0',
    minSpotColor: '#f44336',
    maxSpotColor: '#4caf50',
    spotColor: '#fff3e0',
    spotRadius: 4,
    //tooltipFormat: $.spformat('{{value}}', 'tooltip-class')
  });


  // Project Line chart ( Project Box )
  $("#project-line-1").sparkline([5, 6, 7, 9, 9, 5, 3, 2, 2, 4, 6, 7, 5, 6, 7, 9, 9, 5, 3, 2, 2, 4, 6, 7], {
    type: 'line',
    width: '100%',
    height: '100',
    lineWidth: 2,
    lineColor: '#00bcd4',
    fillColor: 'rgba(0, 188, 212, 0.5)',
  });

  $("#project-line-2").sparkline([6, 7, 5, 6, 7, 9, 9, 5, 3, 2, 2, 4, 6, 7, 5, 6, 7, 9, 9, 5, 3, 2, 2, 4], {
    type: 'line',
    width: '100%',
    height: '30',
    lineWidth: 2,
    lineColor: '#00bcd4',
    fillColor: 'rgba(0, 188, 212, 0.5)',
    //tooltipFormat: $.spformat('{{value}}', 'tooltip-class')
  });

  $("#project-line-3").sparkline([2, 4, 6, 7, 5, 6, 7, 9, 5, 6, 7, 9, 9, 5, 3, 2, 9, 5, 3, 2, 2, 4, 6, 7], {
    type: 'line',
    width: '100%',
    height: '30',
    lineWidth: 2,
    lineColor: '#00bcd4',
    fillColor: 'rgba(0, 188, 212, 0.5)',
    //tooltipFormat: $.spformat('{{value}}', 'tooltip-class')
  });

  $("#project-line-4").sparkline([9, 5, 3, 2, 2, 4, 6, 7, 5, 6, 7, 9, 5, 6, 7, 9, 9, 5, 3, 2, 2, 4, 6, 7], {
    type: 'line',
    width: '100%',
    height: '30',
    lineWidth: 2,
    lineColor: '#00bcd4',
    fillColor: 'rgba(0, 188, 212, 0.5)',
    //tooltipFormat: $.spformat('{{value}}', 'tooltip-class')
  });

  // Sales chart (Sider Bar Chat)
  $("#sales-line-1").sparkline([5, 6, 7, 9, 9, 5, 3, 2, 2, 4, 6], {
    type: 'line',
    height: '80',
    width: '80',
    lineWidth: 3,
    lineColor: '#2196f3',
    fillColor: 'rgba(114, 202, 249, 1)',
    //tooltipFormat: $.spformat('{{value}}', 'tooltip-class')
  });

  $("#sales-line-2").sparkline([6, 7, 5, 6, 7, 9, 9, 5, 3, 2, 2], {
    type: 'line',
    height: '80',
    width: '80',
    lineColor: '#ffc107',
    fillColor: 'rgba(225, 213, 79, 1)',
    //tooltipFormat: $.spformat('{{value}}', 'tooltip-class')
  });

  $("#sales-bar-1").sparkline([2, 5, 3, 2, 2, 4, 6, 7, 5, 6, 7], {
    type: 'bar',
    height: '50',
    width: '80',
    barSpacing: 2,
    barColor: '#FF4081',
    //tooltipFormat: $.spformat('{{value}}', 'tooltip-class')
  });

  $("#sales-bar-2").sparkline([2, 5, 3, 2, 2, 4, 6, 7, 5, 6, 7], {
    type: 'bar',
    height: '50',
    width: '80',
    barSpacing: 2,
    barColor: '#2196f3',
    //tooltipFormat: $.spformat('{{value}}', 'tooltip-class')
  });

  $("#sales-bar-3").sparkline([2, 5, 3, 2, 2, 4, 6, 7, 5, 6, 7], {
    type: 'bar',
    height: '50',
    width: '80',
    barSpacing: 2,
    barColor: '#8bc34a',
    //tooltipFormat: $.spformat('{{value}}', 'tooltip-class')
  });

  $("#sales-bar-4").sparkline([2, 5, 3, 2, 2, 4, 6, 7, 5, 6, 7], {
    type: 'bar',
    height: '50',
    width: '80',
    barSpacing: 2,
    barColor: '#ffd740',
    //tooltipFormat: $.spformat('{{value}}', 'tooltip-class')
  });


  /*
  Sparkline sample charts
  */


  $("#bar-chart-sample").sparkline([70, 80, 65, 78, 58, 80, 78, 80, 70,], {
    type: 'bar',
    height: '80',
    width: '50%',
    barWidth: 20,
    barSpacing: 10,
    barColor: '#ec407a',
    //tooltipFormat: $.spformat('{{value}}', 'tooltip-class')
  });


  $("#line-chart-sample").sparkline([5, 6, 7, 9, 9, 5, 3, 2, 2, 4, 6, 7, 5, 6, 7, 9, 9], {
    type: 'line',
    width: '100%',
    height: '100',
    lineWidth: 2,
    lineColor: '#673ab7',
    fillColor: 'rgba(179, 157, 219, 1)',
    highlightSpotColor: '#7e57c2',
    highlightLineColor: '#7e57c2',
    minSpotColor: '#bbdefb',
    maxSpotColor: '#4caf50',
    spotColor: '#7e57c2',
    spotRadius: 4,
    //tooltipFormat: $.spformat('{{value}}', 'tooltip-class')
  });


  $("#pie-chart-sample").sparkline([50, 60, 80, 110], {
    type: 'pie',
    width: '130',
    height: '130',
    //tooltipFormat: $.spformat('{{value}}', 'tooltip-class'),
    sliceColors: ['#ab47bc', '#03a9f4', '#cddc39', '#ff7043',]
  });
}
$(function () {
  chartInit();
});

$(window).on('resize', function () {
  chartInit();
})