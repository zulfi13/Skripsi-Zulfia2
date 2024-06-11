@extends ('template')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manajemen Kapasitas Rak</h6>
    </div>
    <div id="dataList"></div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                            <label>Show 
                            <select id="filteredBykode" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="All">All Raks</option>
                                    <option value="A">Rak A</option>
                                    <option value="B">Rak B</option>
                                    <option value="C">Rak C</option>
                                    <option value="D">Rak D</option>
                                    <option value="E">Rak E</option>
                                    <option value="F">Rak F</option>
                                    <option value="G">Rak G</option>
                                    <option value="H">Rak H</option>
                                </select> 
                                entries
                            </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6" style="margin: 10px 0;">
            <a href="{{ route('kapsrak.create') }}" class="btn btn-success"> + Add New Rak</a>
                <br>
			</div>
            <div class="col-sm-12">
                <table class="table table-bordered border-primary" id="tabelrak"> 
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center;">Kode</th>
                            <th scope="col" style="text-align: center;">Alamat Rak</th>
                            <th scope="col" style="text-align: center;">Panjang</th>
                            <th scope="col" style="text-align: center;">Lebar</th>
                            <th scope="col" style="text-align: center;">Tinggi</th>
                            <th scope="col" style="text-align: center;">Tinggi Atas</th>
                            <th scope="col" style="text-align: center;">Tinggi Total</th>
                            <th scope="col" style="text-align: center;">Volume Rak</th>
                            <th scope="col" style="text-align: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 
<script src="{{asset('template/vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
<script>
        $(document).ready(function () {
            $('#filteredBykode').change(function () {
                $("#tabelrak").DataTable().ajax.reload(null, false);
            });

            $('#tabelrak').dataTable( {
                scrollX:true,
                processing:true,
                paging:false,
                searching:true,
                scrollY:"500px",
                autoWidth:true,
                "ajax":{
                    "url": "{{route('kapsrak.getdata')}}",
                    "type": "get",
                    "data": function(d){
                        d.rak= $("#filteredBykode").val()
                    },
                    dataType: "JSON",
                },
                columns:[
                    {
                        data: "kode",
                        name: "kode"
                    },
                    {
                        data: "alamat",
                        name: "alamat"
                    },
                    {
                        data: "panjang",
                        name: "panjang"
                    },
                    {
                        data: "lebar",
                        name: "lebar"
                    },
                    {
                        data: "tinggi",
                        name: "tinggi"
                    },
                    {
                        data: "tinggiAts",
                        name: "tinggiAts"
                    },
                    {
                        data: "tinggiTtl",
                        name: "tinggiTtl"
                    },
                    {
                        data: "volume",
                        name: "volume"
                    },
                    {
                        render:function(data, row){
                            return "tes"
                        }
                    }
                ]
            } );
        });

    </script>
@endsection