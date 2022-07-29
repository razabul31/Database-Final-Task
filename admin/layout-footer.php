<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer text-center text-muted">
    Copyright &copy; AHM <?= date('Y'); ?>
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>

<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- apps -->
<!-- apps -->
<script src="../assets//dist/js/app-style-switcher.js"></script>
<script src="../assets//dist/js/feather.min.js"></script>
<script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="../assets//dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="../assets//dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<script src="../assets/extra-libs/c3/d3.min.js"></script>
<script src="../assets/extra-libs/c3/c3.min.js"></script>
<script src="../assets/libs/chartist/dist/chartist.min.js"></script>
<script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
<script src="../assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
<script src="../assets/dist/js/pages/dashboards/dashboard1.min.js"></script>
<!--This page plugins -->
<script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/dist/js/pages/datatable/datatable-basic.init.js"></script>

<script src="../assets/extra-libs/datatables.net/js/dataTables.buttons.min.js"></script>
<script src="../assets/extra-libs/datatables.net/js/jszip.min.js"></script>
<script src="../assets/extra-libs/datatables.net/js/pdfmake.min.js"></script>
<script src="../assets/extra-libs/datatables.net/js/vfs_fonts.js"></script>
<script src="../assets/extra-libs/datatables.net/js/buttons.html5.min.js"></script>
<script src="../assets/extra-libs/datatables.net/js/buttons.print.min.js"></script>

<!-- Top modal content -->
<div id="logoutModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-top">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="topModalLabel">Ingin keluar?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Pilih tombol "Logout" jika Anda ingin mengakhiri sesi</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                <a href="logout.php" class="btn btn-primary">Logout</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $(document).ready(function() {
        var t = $('#table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf'
            ],
            "language": {
                "sProcessing": "Sedang memproses ...",
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecord": "Maaf data tidak tersedia",
                "info": "Menampilkan _PAGE_ halaman dari _PAGES_ halaman",
                "infoEmpty": "Tidak ada data yang tersedia",
                "infoFiltered": "(difilter dari _MAX_ total data)",
                "zeroRecords": "Tidak ditemukan data yang cocok",
                "sSearch": "Cari",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                }
            },
        });
    });

    $('#btn-refresh').on('click', () => {
        $('#ic-refresh').addClass('fa-spin');
        var oldURL = window.location.href;
        var index = 0;
        var newURL = oldURL;
        index = oldURL.indexOf('?');
        if (index == -1) {
            window.location = window.location.href;

        }
        if (index != -1) {
            window.location = oldURL.substring(0, index)
        }

    });

    function change() {
        var x = document.getElementById('password').type;
        if (x == 'password') {
            document.getElementById('password').type = 'text';
            document.getElementById('eye-button').innerHTML = `<i class="fas fa-fw fa-eye-slash" title="sembunyikan password"></i>`;
        } else {
            document.getElementById('password').type = 'password';
            document.getElementById('eye-button').innerHTML = `<i class="fas fa-fw fa-eye" title="tampilkan password"></i>`;
        }
    }
</script>

<!-- Ajax for showing Harga from selected Varian -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#varian").change(function() {
            var Varian = $(this).val();
            $.ajax({
                url: 'transaksi-harga.php',
                type: 'post',
                data: {
                    varian: Varian
                },
                async: true,
                dataType: 'json',
                success: function(response) {
                    var len = response.length;
                    $("#harga").empty();
                    for (var i = 0; i < len; i++) {
                        var harga = response[i]['harga'];
                        $("#harga").append("<option value='" + harga + "'> Rp " + harga + "</option>");
                    }
                }
            });
        });
    });
</script>

</body>

</html>