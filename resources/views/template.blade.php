<!DOCTYPE html>
<html lang="en">

<head>
    <title>Skripsi-Zulfia</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template-->
    <link href="{{asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <!-- Custom styles for this template-->
    <link href="{{asset('template/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('template/css/denahrak.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/styledenah.css') }}">   
    <link rel="stylesheet" href="{{ asset('template/css/stylepagination.css') }}">   
    <!-- DataTable -->
    <link rel="stylesheet" href="{{asset('template/vendor/datatables/dataTables.bootstrap4.css')}}">
    <!-- Menggunakan CDN untuk Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Menggunakan CDN untuk Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>

    <!-- Page Wrapper -->
    <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex flex-column align-items-center justify-content-center" href="dashboard" style="height: 150px;">
    
    <div>
        <img src="../template/img/ipg-logo.png" width="70px" alt="logo-ipg" style="margin-bottom: 5px">
    </div>
    <div class="sidebar-brand-text mx-2 text-center">
        PT. INDOPRIMA GEMILANG PLANT-1
    </div>
</a>

                    
        <!-- Divider -->
        <hr class="sidebar-divider" style="margin-top: 0.5rem; margin-bottom: 0.5rem;">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Nav Item - Denah -->
        <li class="nav-item">
            <a class="nav-link" href="denahrak">
                <i class="fas fa-fw fa-table"></i>
                <span>Denah Rak</span></a>
        </li>

        <!-- Nav Item - Kedatangan -->
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-truck"></i>
                <span>Kedatangan Material</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="prosdtg">Diproses</a>
                    <a class="collapse-item" href="prosdtg">Diantar</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Manajemen Kapasitas -->
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Manajemen Kapasitas</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="kapsrak">Kapasitas Rak</a>
                    <a class="collapse-item" href="kapsmaterial">Kapasitas Material</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-right d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">


                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-900 small">ZULFIA LUTFIANI</span>
                                    <img class="img-profile rounded-circle"
                                        src="{{asset('template/img/zulfi.jpeg')}}">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        @yield('content')                        
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
            
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Skripsi-Zulfia</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{asset('template/js/sb-admin-2.min.js')}}"></script>
        
        <script src="{{asset('template/vendor/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.js')}}"></script>

        <script>
             $(document).ready(function () {
            $('#filteredBykode').change(function () {
                var kodeValue = $(this).val();

                // Make AJAX request
                $.getJSON("/kapsrak/filter/" + kodeValue, function (data) {
                    console.log(data); // Log server response

                    if (Array.isArray(data)) {
                        displayTable(data);
                    } else {
                        console.error("Invalid data format received from the server.");
                    }
                })
                .fail(function (jqxhr, textStatus, error) {
                    console.error("AJAX Request Failed:", textStatus, error);
                    console.log(jqxhr.responseText); // Log response text for more details
                });

                $("#tabelrak").DataTables().ajax.reload(null, false);
            });

            function displayTable(data) {
                var table = '<thead><tr><th>Kode Rak</th></tr></thead><tbody>';
                
                // Loop through the data and create table rows
                for (var i = 0; i < data.length; i++) {
                    table += '<tr>';
                    table += '<td>' + data[i].kode + '</td>';
                    // Add more columns if needed
                    table += '</tr>';
                }

                table += '</tbody>';

                // Clear the table and then append new content
                $('#dataTable').empty().html(table);
            }

        });

        $(function(){
            $("#tabelrak").DataTable({
                scrollX:true,
                processing:true,
                paging:false,
                scrollY:"500px",
                autoWidth:true,
                "ajax":{
                    "url": "{{route('kapsrak.getdata')}}",
                    "type": "get",
                    "data": function(d){
                        d.rak= $("#filteredBykode").val()
                    },
                    "dataType": "JSON"
                },
                columns:[
                    {
                        data: "kode",
                        nama: "kode"
                    },
                    {
                        data: "alamat",
                        nama: "alamat"
                    },
                    {
                        data: "panjang",
                        nama: "panjang"
                    },
                    {
                        data: "lebar",
                        nama: "lebar"
                    },
                    {
                        data: "tinggi",
                        nama: "tinggi"
                    },
                    {
                        data: "tinggiAts",
                        nama: "tinggiAts"
                    },
                    {
                        data: "tinggiTtl",
                        nama: "tinggiTtl"
                    },
                    {
                        data: "volume",
                        nama: "volume"
                    },
                    {
                        render:function(data, type, row){
                            return "tes"
                        }
                    }
                ]
            })
        })
        </script>
    </body>

</html>