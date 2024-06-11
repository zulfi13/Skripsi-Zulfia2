document.addEventListener('DOMContentLoaded', function () {
    var downtimeCanvas = document.getElementById('fastMovingChart').getContext('2d');
    var downtimeOptions = {
        responsive: true,
        animation: {
            onComplete: function () {
                var chartInstance = this.chart;
                if (chartInstance) {
                    var ctx = chartInstance.ctx;
                    if (ctx) {
                        ctx.font = "16px Arial";
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'bottom';
                        ctx.fillStyle = '#800000';
                    }
                }
            }
        },
    };

    // Mengambil 10 item teratas yang tipeMaterial-nya 'fast moving'
    var filteredData = serverData.filter(item => item.tipeMaterial === 'fast moving').slice(0, 10);

    var downtimeData = {
        labels: filteredData.map(item => item.itemNumber),
        datasets: [{
            label: "Fast Moving Material",
            backgroundColor: '#2196F3',
            data: filteredData.map(item => item.tipe),
        }]
    };

    var downtimeChart = new Chart(downtimeCanvas, {
        type: 'bar',
        data: downtimeData,
        options: downtimeOptions,
    });
});
