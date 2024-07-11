@extends('template')

@section('custom-css')

@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">INCOMING</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-3">
                <button type="button" class="btn btn-success mb-2 mb-md-0 mr-md-3" data-toggle="modal" data-target="#importExcel">
                    IMPORT EXCEL
                </button>
                <div class="text-center text-md-left">
                    <p class="mb-1"><strong>Total Kapasitas:</strong> {{ number_format($kapasitas->total_kapasitas, 0, ",", ".") }}</p>
                    <p class="mb-1"><strong>Total Terpakai:</strong> {{ number_format($kapasitas->total_terpakai, 0, ",", ".") }}</p>
                    <p class="mb-1"><strong>Sisa Kapasitas:</strong> {{ number_format($kapasitas->sisa_kapasitas, 0, ",", ".") }}</p>
                </div>
            </div>

            <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="/kedatanganmaterial/import_excel" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="file">Pilih file excel</label>
                                    <input type="file" class="form-control-file" id="file" name="file" required="required">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <table id="example2" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama File</th>
                        <th>Luas Kedatangan</th>
                        <th>PIC</th>
                        <th>Tanggal Import</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->file }}</td>
                        <td>{{ number_format($value->luasan_kedatangan, 0, ",", ".") }}</td>
                        <td>{{ $value->pic }}</td>
                        <td>{{ \Carbon\Carbon::make($value->tanggal)->isoFormat('DD MMMM YYYY') }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ url('/kedatanganmaterial/show/'.$value->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                &nbsp;
                                <a class="btn btn-danger btn-sm ondelete"
                                    href="{{url('/kedatanganmaterial/delete/'.$value->id)}}">
                                    <i class="fas fa-trash"></i>
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
