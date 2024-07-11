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
            <a href="{{ route('kapsmaterial.create') }}" class="btn btn-success">
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
                  <th>Product</th>
                  <th>Detail</th>
                  <th>Quantity</th> 
                  <th>Volume (cm3)</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $key => $value)
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>
                        <b>Nama : </b>{{ $value->product_name }}
                        <br>
                        <b>Item Number : </b> {{ $value->item_number }}
                        <br>
                        <b>Part Number : </b> {{ $value->part_number }}
                      </td>
                      <td>
                        <b>Rak : </b> {{ $value->rak_alamat }}
                        <br>
                        <b>Panjang : </b>{{ $value->panjang }}
                        <br>
                        <b>Lebar : </b>{{ $value->lebar }}
                        <br>
                        <b>JR : </b>{{ $value->jr }}
                        <br>
                        <b>Tinggi : </b>{{ $value->tinggi }}
                      </td>
                      <td>
                        <b>Pack : </b>{{ number_format($value->qty_pack, 0, ",", ".") }}
                        <br>
                        <b>Box : </b>{{ number_format($value->qty_box, 0, ",", ".") }}
                      </td>
                      <td>
                        <b>Total Perbox : </b>{{ number_format($value->volume, 0, ",", ".") }}
                        <br>
                        <b>Total Volume : </b>{{ number_format($value->total_volume, 0, ",", ".") }}
                      </td>
                      <td>{{ \Carbon\Carbon::make($value->updated_at)->isoFormat('DD MMMM YYYY') }}</td>
                      <td>
                        <div class="btn-group">
                          <a href="{{ route('kapsmaterial.edit', $value->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit fa-xs"></i>
                          </a>
                          &nbsp;
                          <a class="btn btn-danger btn-sm ondelete" href="{{ url('/kapsmaterial/delete/'.$value->id) }}">
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

