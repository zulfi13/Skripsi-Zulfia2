@extends('template')

@section('custom-css')
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />
@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card cardint">
                        <div class="card-body p-3">
                            <h5 class="">Warehouse Capacity</h5>
                            <div class="mt-3">
                                <div class="d-flex align-items-center justify-content-center" style="vertical-align: middle;">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card cardint">
                        <div class="card-body p-3">
                            <h5 class="text-center text-primary"><strong>Data Total Incoming Material</strong></h5>
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth'
                },
                dayHeaderFormat: { weekday: 'long' },
                dayCellContent: function(arg) {
                    return { html: arg.dayNumberText };
                },
                contentHeight: 'auto',
                aspectRatio: 1.35,
                events: '/calendar-data',
                eventContent: function(arg) {
                    var container = document.createElement('div');
                    container.innerHTML = `
                        <div style="text-align:center;">
                            <b>INCOMING</b><br>
                            (${arg.event.title})
                        </div>`;
                    return { domNodes: [container] };
                }
            });
            calendar.render();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById("myPieChart").getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Total Terpakai", "Total Tersedia"],
                datasets: [{
                    data: [{{ $totalTerpakai }}, {{ $totalTersedia }}],
                    backgroundColor: ['#007bff', '#28a745'],
                    hoverBackgroundColor: ['#0056b3', '#1c7430'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    </script>
@endsection
