@include('sweetalert::alert')

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript -->
{{-- <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script> --}}

<!-- Custom scripts for all pages -->
<script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

<!-- Toastr and SweetAlert2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<script>
    $('.ondelete').click(function(e) {
        e.preventDefault();
        const deleteUrl = $(this).attr('href');
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data Anda Tidak Dapat di Kembalikan",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#adb5bd',
            confirmButtonText: 'Hapus',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = deleteUrl;
            }
        });
    });
</script>
