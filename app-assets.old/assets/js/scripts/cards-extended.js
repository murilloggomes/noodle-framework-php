

// Sampel Line Chart One
// --------------------------

// Options
var SLOption = {
    responsive: true,
    maintainAspectRatio: true,
    datasetStrokeWidth: 3,
    pointDotStrokeWidth: 4,
    tooltipFillColor: "rgba(0,0,0,0.6)",
    legend: {
        display: false,
        position: 'bottom',
    },
    hover: {
        mode: 'label'
    },
    scales: {
        xAxes: [{
            display: false
        }],
        yAxes: [{
            display: false
        }]
    },
    title: {
        display: false,
        fontColor: "#FFF",
        fullWidth: false,
        fontSize: 40,
        text: '82%'
    }
};
var SLlabels = ["January", "February", "March", "April", "May", "June"];

var LineSL1ctx = document.getElementById("custom-line-chart-sample-one").getContext("2d");

var gradientStroke = LineSL1ctx.createLinearGradient(300, 0, 0, 300);
gradientStroke.addColorStop(0, '#0288d1');
gradientStroke.addColorStop(1, '#26c6da');

var gradientFill = LineSL1ctx.createLinearGradient(300, 0, 0, 300);
gradientFill.addColorStop(0, '#0288d1');
gradientFill.addColorStop(1, '#26c6da');

var SL1Chart = new Chart(LineSL1ctx, {
    type: 'line',
    data: {
        labels: SLlabels,
        datasets: [{
            label: "My Second dataset",
            borderColor: gradientStroke,
            pointColor: "#fff",
            pointBorderColor: gradientStroke,
            pointBackgroundColor: "#fff",
            pointHoverBackgroundColor: gradientStroke,
            pointHoverBorderColor: gradientStroke,
            pointRadius: 4,
            pointBorderWidth: 1,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 1,
            fill: true,
            backgroundColor: gradientFill,
            borderWidth: 1,
            data: [24, 18, 20, 30, 40, 43, ]
        }]
    },
    options: SLOption
});


// //Sampel Line Chart Two

var LineSL2ctx = document.getElementById("custom-line-chart-sample-two").getContext("2d");

var gradientStroke = LineSL2ctx.createLinearGradient(500, 0, 0, 200);
gradientStroke.addColorStop(0, '#8e24aa');
gradientStroke.addColorStop(1, '#ff6e40');

var gradientFill = LineSL2ctx.createLinearGradient(500, 0, 0, 200);
gradientFill.addColorStop(0, '#8e24aa');
gradientFill.addColorStop(1, '#ff6e40');

var SL2Chart = new Chart(LineSL2ctx, {
    type: 'line',
    data: {
        labels: SLlabels,
        datasets: [{
            label: "My Second dataset",
            borderColor: gradientStroke,
            pointColor: "#fff",
            pointBorderColor: gradientStroke,
            pointBackgroundColor: "#fff",
            pointHoverBackgroundColor: gradientStroke,
            pointHoverBorderColor: gradientStroke,
            pointRadius: 4,
            pointBorderWidth: 1,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 1,
            fill: true,
            backgroundColor: gradientFill,
            borderWidth: 1,
            data: [24, 18, 20, 30, 40, 43, ]
        }]
    },
    options: SLOption
});

//Sampel Line Chart Three

var LineSL3ctx = document.getElementById("custom-line-chart-sample-three").getContext("2d");

var gradientStroke = LineSL3ctx.createLinearGradient(500, 0, 0, 200);
gradientStroke.addColorStop(0, '#ff6f00');
gradientStroke.addColorStop(1, '#ffca28');

var gradientFill = LineSL3ctx.createLinearGradient(500, 0, 0, 200);
gradientFill.addColorStop(0, '#ff6f00');
gradientFill.addColorStop(1, '#ffca28');

var SL3Chart = new Chart(LineSL3ctx, {
    type: 'line',
    data: {
        labels: SLlabels,
        datasets: [{
            label: "My Second dataset",
            borderColor: gradientStroke,
            pointColor: "#fff",
            pointBorderColor: gradientStroke,
            pointBackgroundColor: "#fff",
            pointHoverBackgroundColor: gradientStroke,
            pointHoverBorderColor: gradientStroke,
            pointRadius: 4,
            pointBorderWidth: 1,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 1,
            fill: true,
            backgroundColor: gradientFill,
            borderWidth: 1,
            data: [24, 18, 20, 30, 40, 43, ]
        }]
    },
    options: SLOption
});