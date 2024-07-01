@extends('template')

@section('custom-css')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Add New Material</div>

                <div class="card-body">
                    <form method="post" action="{{ route('kapsmaterial.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="itemNumber">Item Number</label>
                            <input type="text" class="form-control" id="itemNumber" name="itemNumber" required>
                        </div>

                        <div class="form-group">
                            <label for="partNumber">Part Number</label>
                            <input type="text" class="form-control" id="partNumber" name="partNumber" required>
                        </div>

                        <div class="form-group">
                            <label for="productName">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="productName" required>
                        </div>

                        <div class="form-group">
                            <label for="rak">Rak</label>
                            <select name="rak_id" id="rak" class="form-control select2" required>
                                <option selected disabled value="">Pilih Rak</option>
                                @foreach($rak as $rakItem)
                                <option value="{{ $rakItem->id }}">{{ $rakItem->alamat }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pjp">Panjang</label>
                            <input type="text" class="form-control" id="panjang" name="pjg" onchange="updateVolume()">
                        </div>
                    
                        <div class="form-group">
                            <label for="lbr">Lebar</label>
                            <input type="text" class="form-control" id="lebar" name="lbr" onchange="updateVolume()">
                        </div>
                    
                        <div class="form-group">
                            <label for="jr">Diameter</label>
                            <input type="text" class="form-control" id="diameter" name="jr" onchange="updateVolume()">
                        </div>
                    
                        <div class="form-group">
                            <label for="tng">Tinggi</label>
                            <input type="text" class="form-control" id="tinggi" name="tng" onchange="updateVolume()">
                        </div>

						<div class="form-group">
                            <label for="vol">Volume</label>
                            <input type="text" class="form-control" id="volume" name="vol" readonly>
                        </div>

						<div class="form-group">
                            <label for="qtyPack">Qty Pack</label>
                            <input type="text" class="form-control" id="qtyPack" name="qtyPack" required>
                        </div>

						<div class="form-group">
                            <label for="qtyBox">Qty Box</label>
                            <input type="text" class="form-control" id="qtyBox" name="qtyBox" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<script>
    function updateVolume() {
        // Ambil nilai dari panjang, lebar, dan tinggi
        var panjang = parseFloat(document.getElementById('panjang').value) || 0;
        var lebar = parseFloat(document.getElementById('lebar').value) || 0;
        var tinggi = parseFloat(document.getElementById('tinggi').value) || 0;

        // Jika panjang, lebar, dan tinggi diisi, itu adalah balok
        if (panjang && lebar && tinggi) {
            var volume = panjang * lebar * tinggi;
            document.getElementById('volume').value = volume.toLocaleString('id-ID', { maximumFractionDigits: 2 });
            return;
        }

        // Ambil nilai dari diameter dan tinggi
        var diameter = parseFloat(document.getElementById('diameter').value) || 0;

        // Jika diameter dan tinggi diisi, itu adalah tabung
        if (diameter && tinggi) {
            var jariJari = diameter / 2;
            var volume = Math.PI * Math.pow(jariJari, 2) * tinggi;
            document.getElementById('volume').value = volume.toLocaleString('id-ID', { maximumFractionDigits: 2 });
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#rak').select2({
            theme: 'bootstrap4',
            placeholder: 'Pilih Rak',
        });
    });
</script>
@endsection