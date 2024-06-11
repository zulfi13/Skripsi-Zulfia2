@extends('template')

@section('content')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manajemen Kapasitas Material</h6>
    </div>
    <div class="card-body">
      <div class="table-wrapper table-responsive">
        <hr>
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-6"></div>

            <div class="col-sm-12 col-md-6">
              <div id="dataTable_filter" class="dataTables_filter"></div>         
            </div>

            <form action="/kapsmaterial" class="col-sm" method="get">
                <label class="form-label">Item Number</label>
                  <input name="itemNumber" type="search" class="form-control" id="txtsearchitem" autocomplete="off" placeholder="Cari Item Number">
            </form>
            
            <form action="/kapsmaterial" class="col-sm" method="get">
              <label class="form-label">Product</label>
                <input name="productName" type="search" class="form-control" id="txtsearchname" autocomplete="off" placeholder="Cari Product">
            </form> 
             
          </div>
        </div>
        <hr>
        
        <div class="col-sm-6" style="margin: 10px 0;">
          <a href="{{ route('kapsmaterial.create') }}" class="btn btn-success"> + Add New Material</a>
        </div>

        <div class="col-sm-12">
          <table class="table table-bordered border-primary">
            <thead>
              <tr>
                <th scope="col" style="text-align: center;">Item Number</th>
                <th scope="col" style="text-align: center;">Part Number</th>
                <th scope="col" style="text-align: center;">Product</th>
                <th scope="col" style="text-align: center;">Panjang (cm)</th>
                <th scope="col" style="text-align: center;">Lebar (cm)</th>
                <th scope="col" style="text-align: center;">Diameter (cm)</th>
                <th scope="col" style="text-align: center;">Tinggi (cm)</th>
                <th scope="col" style="text-align: center;">Volume (cm3)</th>
                <th scope="col" style="text-align: center;">Quantity Pack</th>
                <th scope="col" style="text-align: center;">Quantity Box</th>
                <th scope="col" style="text-align: center;">Date&Time</th>
                <th scope="col" style="text-align: center;">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($dataMaterials as $dataMaterial)
                <tr>
                    <td>{{ $dataMaterial ->itemNumber }}</td>
                    <td>{{ $dataMaterial ->partNumber }}</td>
                    <td>{{ $dataMaterial ->productName }}</td>
                    <td>{{ $dataMaterial ->pjg }}</td>
                    <td>{{ $dataMaterial ->lbr }}</td>
                    <td>{{ $dataMaterial ->jr }}</td>
                    <td>{{ $dataMaterial ->tng }}</td>
                    <td>{{ $dataMaterial ->vol }}</td>
                    <td>{{ $dataMaterial ->qtyPack }}</td>
                    <td>{{ $dataMaterial ->qtyBox }}</td>
                    <td>{{ $dataMaterial ->updated_time }}</td>
                    <td>
                      <div class="btn-group float-center mr-2">
                        <!-- Tombol Edit dengan ikon -->
                        <a href="{{ route('kapsmaterial.edit', $dataMaterial->itemNumber) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit fa-xs"></i>
                        </a>
                        <form action="{{ route('kapsmaterial.destroy', $dataMaterial->itemNumber) }}" method="POST">
                          @csrf
                          @method('DELETE')

                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                              <i class="fas fa-trash-alt fa-xs"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        
    </div>
  </div>
      </div>
    </div>
  </div>
@endsection