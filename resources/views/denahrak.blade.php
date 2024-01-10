<!-- denahrak.blade.php -->
@extends('template')

@section('title', 'Denah Rak Warehouse')

@section('content')
    <div class="h2">
        <h2>Denah Rak Warehouse</h2>
    </div>
    <div class="warehouse">
        <div class="room" id="room1">Loket 1</div>
        <div class="room" id="room2">Area CNC Produksi </div>
        <div class="room" id="room3">Area Substore<br> Wire Produksi </div>
        <div class="room" id="room4">Area Sub dan Meterial</div>
        <div class="room" id="room5">Area Transit A 28 Pallet </div>
        <div class="room" id="room6"> </div>
        <div class="room" id="room7">QC Incoming </div>
        <div class="room" id="room8">Admin Incoming </div>
        <div class="room" id="room9">Area Kanban </div>
        <div class="room" id="room10">Rak A (Wire) </div>
        <div class="room" id="room11">Rak A (Wire) </div>
        <div class="room" id="room12">Rak Kanban </div>
        <div class="room" id="room13">Rak B (Wire) </div>
        <div class="room" id="room14">Rak B (Wire) </div>
        <div class="room" id="room15">Rak C (Accessoris) </div>
        <div class="room" id="room16">Rak C (Assy) </div>
        <div class="room" id="room17">Rak D (Terminal) </div>
        <div class="room" id="room18">Rak D (Terminal) </div>
        <div class="room" id="room19">Area Wire Batterey Cable 12 Pallet </div>
        <div class="room" id="room20">Rak E (Terminal) </div>
        <div class="room" id="room21">Rak E (Terminal) </div>
        <div class="room" id="room22">Material RN </div>
        <div class="room" id="room23">Rak F (Sub Assy) </div>
        <div class="room" id="room24">Rak F (Sub Assy) </div>
        <div class="room" id="room25">Material RN </div>
        <div class="room" id="room26">Rak G (Sub Assy) </div>
        <div class="room" id="room27">Rak G (Sub Assy) </div>
        <div class="room" id="room28">Rak H (Sub Assy) </div>
        <div class="room" id="room29">Area Transit GOEI </div>
        <div class="room" id="room30">Rak I (Material Deadstok) </div>
        <div class="room" id="room31">Area Transit B </div>
        <div class="room" id="room32">Parkir Forklift </div>
        <div class="room" id="room33">Rak K CS/IS<br> Rak K Sub Material </div>
        <div class="room" id="room34">Area CS/IS 30 Pallet </div>
        <div class="room" id="room35">Area Material Preparation </div>
        <div class="room" id="room36">Area Cutting Tube </div>
        <div class="room" id="room37">Area Tube<br> Rak L </div>
        <div class="room" id="room38">Area Tapping <br> Rak J </div>
        <div class="room" id="room39">Workshop Area </div>

    </div>
    <hr>

   
    <!-- Form Search -->
    <div class="container-fluid">
    <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
        </div>
    </form>
</div>

    <!-- Navbar dengan Form Pencarian di Tengah -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <!-- Form Pencarian (Di Tengah) -->
            
                <form class="form-inline my-2 my-lg-0">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            
        </div>
    </nav>

    <!-- Tabel -->
    <table>
        <thead>
            <tr>
                <th>Header 1</th>
                <th>Header 2</th>
                <th>Header 3</th>
                <th>Header 4</th>
                <!-- Tambahkan kolom header lainnya jika diperlukan -->
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Data 1</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 4</td>
                <!-- Tambahkan kolom data lainnya jika diperlukan -->
            </tr>
            <tr>
            <td>Data 1</td>
                <td>Data 2</td>
                <td>Data 3</td>
                <td>Data 4</td>
</tr>
        </tbody>
    </table>

    <!-- Tambahan: Gunakan CSS untuk memberikan gaya -->
    <style>
        .rak {
            /* Gaya untuk tampilan rak */
            margin-bottom: 20px; /* Atur margin bawah agar terpisah dari tabel */
        }

        table {
            /* Gaya untuk tabel */
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; /* Atur margin atas agar terpisah dari tampilan rak */
        }

        th, td {
            /* Gaya untuk sel header dan data */
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
    </style>
@endsection
