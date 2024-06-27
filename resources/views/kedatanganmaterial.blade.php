@extends('template')
@section ('content')
<div class=container>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">INCOMING</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row"></div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection