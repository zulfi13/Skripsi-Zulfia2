@extends('template')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="container">
            <div class="card cardint">
                <div class="card-body p-3">
                    <h5 class="">Warehouse Capacity</h5>
                    <div class="mt-3">
                        <div class="d-flex align-items-center justify-content-center" style="vertical-align: middle;">
                            <canvas id="warehouseCapacityChart" style="min-height: 330px; max-height:100%; height: auto;"></canvas>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('warehouseCapacityChart').getContext('2d');
        var serverData = @json($data);

        var data = {
            labels: ['Used Capacity', 'Free Capacity'],
            datasets: [{
                data: [serverData.used, serverData.free],
                backgroundColor: ['#FF6384', '#36A2EB'],
                hoverBackgroundColor: ['#FF6384', '#36A2EB']
            }]
        };

        var options = {
            responsive: true,
            maintainAspectRatio: false,
        };

        var myDoughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: options
        });
    });
</script>
@endsection
