var ctx = document.getElementById('myCh').getContext('2d');
Chart.pluginService.register({
    afterDraw: function(chartInstance) {
        var ctx = chartInstance.chart.ctx;

        // render the value of the chart above the bar
        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, 'normal', Chart.defaults.global.defaultFontFamily);
        ctx.textAlign = 'center';
        ctx.textBaseline = 'bottom';
        ctx.fillStyle = 'black';

        chartInstance.data.datasets.forEach(function(dataset) {
            for (var i = 0; i < dataset.data.length; i++) {
                var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model;
                ctx.fillText(dataset.data[i], model.x, model.y - 2);
            }
        });
    }
});
var myCh = new Chart(ctx, {
    type: 'bar',
    data: false,

    options: {
        showAllTooltips: true,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                }
            }]
        }
    },
    animation: {
        duration: 500,
        easing: "easeOutQuart",
        onComplete: function() {
            var ctx = this.chart.ctx;
            ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
            ctx.textAlign = 'center';
            ctx.textBaseline = 'bottom';

            this.data.datasets.forEach(function(dataset) {
                for (var i = 0; i < dataset.data.length; i++) {
                    var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                        scale_max = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._yScale.maxHeight;
                    ctx.fillStyle = '#444';
                    var y_pos = model.y - 5;
                    // Make sure data value does not get overflown and hidden
                    // when the bar's value is too close to max value of scale
                    // Note: The y value is reverse, it counts from top down
                    if ((scale_max - model.y) / scale_max >= 0.93)
                        y_pos = model.y + 20;
                    ctx.fillText(dataset.data[i], model.x, y_pos);
                }
            });
        }
    }
});

$.ajax({
    type: "POST",
    url: "chart1.php",
    dataType: "json",
    success: function(data) {

        console.log(data);

        myCh.data = data;
        myCh.update({
            duration: 2000,
            easing: 'linear'
        });
    },
    error: function(request, status, error) {
        alert(request.responseText);
    }
});