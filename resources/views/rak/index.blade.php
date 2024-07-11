@extends('template')

@section('custom-css')

@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manajemen Kapasitas Rak</h6>
    </div>
    <div class="card-body">
        <div class="row mb-2 d-flex justify-content-end mr-auto mt-2">
            <div class="ml-auto">
                <a href="{{ route('kapsrak.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i>
                    Tambah Data
                </a>
            </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table id="example2" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Rak</th>
                        <th>Panjang</th>
                        <th>Lebar</th>
                        <th>Tinggi</th>
                        <th>Tinggi Atas</th>
                        <th>Tinggi Total</th>
                        <th>Volume</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $value)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>
                            <b>Kode : </b>{{ $value->kode }}
                            <br>
                            <b>Alamat : </b> {{ $value->alamat }}
                        </td>
                        <td>{{ $value->panjang }}</td>
                        <td>{{ $value->lebar }}</td>
                        <td>{{ $value->tinggi }}</td>
                        <td>{{ $value->tinggi_atas }}</td>
                        <td>{{ number_format($value->tinggi_total, 0, ",", ".") }}  </td>                
                        <td>{{ number_format($value->volume, 0, ",", ".") }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('kapsrak.edit', $value->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit fa-xs"></i>
                                </a>
                                &nbsp;
                                <a href="{{ url('/kapsrak/delete', $value->id) }}" class="btn btn-danger btn-sm ondelete">
                                    <i class="fas fa-trash fa-xs"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
    <script>
        $(document).ready(function() {
            $('#example2').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
