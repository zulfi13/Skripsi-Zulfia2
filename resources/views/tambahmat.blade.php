@extends('template')

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

						<div class="form-group">
                            <label for="berat">Berat</label>
                            <input type="text" class="form-control" id="berat" name="berat" required>
                        </div>

                        <div class="form-group">
                            <label for="berat">Date&Time</label>
                            <input type="datetime-local" class="form-control" id="datetime" name="datetime" required>
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
<script>
    function updateVolume() {
        // Ambil nilai dari panjang, lebar, dan tinggi
        var panjang = parseFloat(document.getElementById('panjang').value) || 0;
        var lebar = parseFloat(document.getElementById('lebar').value) || 0;
        var tinggi = parseFloat(document.getElementById('tinggi').value) || 0;

        // Jika panjang, lebar, dan tinggi diisi, itu adalah balok
        if (panjang && lebar && tinggi) {
            var volume = panjang * lebar * tinggi;
            document.getElementById('volume').value = volume.toFixed(2);
            return;
        }

        // Ambil nilai dari diameter dan tinggi
        var diameter = parseFloat(document.getElementById('diameter').value) || 0;

        // Jika diameter dan tinggi diisi, itu adalah tabung
        if (diameter && tinggi) {
            var jariJari = diameter / 2;
            var volume = Math.PI * Math.pow(jariJari, 2) * tinggi;
            document.getElementById('volume').value = volume.toFixed(2);
        }
    }
	function showSuccessNotification() {
        toastr.success('Data material berhasil ditambahkan', 'Sukses');
    }
</script>
<script>
// Mengisi otomatis kolom datetime dengan tanggal dan waktu saat ini
document.getElementById('datetime').valueAsDate = new Date();
</script>
@endsection
