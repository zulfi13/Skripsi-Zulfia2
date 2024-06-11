@extends('template')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
    <div class="container">
    <div class="card cardint">
                <div class="card-body p-3">
                    <h5 class="">Material Fast Moving</h5>
                    <div class="mt-3">
                    <div class="d-flex align-items-center justify-content-center" style="vertical-align: middle;">
                            <canvas id="fastMovingChart" style="min-height: 330px; max-height:100%; height: auto; "></canvas>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>
<script>
        var serverData = @json($data);
        console.log(serverData);
</script>
<script src="{{ asset('template/js/dashboardchart.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var serverData = <?php echo json_encode($data); ?>;
</script> 

@endsection