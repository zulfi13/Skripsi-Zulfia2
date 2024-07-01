@extends('template')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Add New Rak</div>
                <div class="card-body">
                    <form method="post" action="{{ route('kapsrak.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" class="form-control" id="kode" name="kode" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="panjang">Panjang</label>
                            <input type="text" class="form-control" id="panjang" name="panjang" onchange="updateVolume()" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="lebar">Lebar</label>
                            <input type="text" class="form-control" id="lebar" name="lebar" onchange="updateVolume()" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="tinggi">Tinggi</label>
                            <input type="text" class="form-control" id="tinggi" name="tinggi" onchange="updateTinggiTtl()">
                        </div>
                    
                        <div class="form-group">
                            <label for="tinggiAts">Tinggi Atas</label>
                            <input type="text" class="form-control" id="tinggiAts" name="tinggiAts" onchange="updateTinggiTtl()">
                        </div>
                    
                        <div class="form-group">
                            <label for="tinggiTtl">Tinggi Total</label>
                            <input type="text" class="form-control" id="tinggiTtl" name="tinggiTtl" readonly>
                        </div>
                    
                        <div class="form-group">
                            <label for="volume">Volume</label>
                            <input type="text" class="form-control" id="volume" name="volume" readonly>
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
            var panjang = parseFloat(document.getElementById('panjang').value) || 0;
            var lebar = parseFloat(document.getElementById('lebar').value) || 0;
            var tinggiTtl = parseFloat(document.getElementById('tinggiTtl').value) || 0;

            // Menghitung volume
            var volume = panjang * lebar * tinggiTtl;

            // Mengisi nilai volume ke input volume
            document.getElementById('volume').value = volume.toLocaleString('id-ID');
        }

        function updateTinggiTtl() {
            var tinggi = parseFloat(document.getElementById('tinggi').value) || 0;
            var tinggiAts = parseFloat(document.getElementById('tinggiAts').value);

            // Memastikan bahwa jika tinggiAts tidak diisi atau bukan angka, nilainya adalah 0
            if (isNaN(tinggiAts)) {
                tinggiAts = 0;
            }

            // Menghitung tinggiTtl
            var tinggiTtl = tinggi + tinggiAts;

            // Mengisi nilai tinggiTtl ke input tinggiTtl
            document.getElementById('tinggiTtl').value = tinggiTtl;

            // Memanggil fungsi updateVolume setelah mengupdate tinggiTtl
            updateVolume();
        }

        // Mengupdate nilai tinggiTtl saat tinggi atau tinggiAts berubah
        document.getElementById('tinggi').addEventListener('input', updateTinggiTtl);
        document.getElementById('tinggiAts').addEventListener('input', updateTinggiTtl);
    </script>
@endsection
