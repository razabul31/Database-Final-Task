<?php
$title = 'Database';
require 'layout-header.php';
require 'layout-topbar.php';
require 'layout-sidebar.php';
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body rounded collapse show">
            <h3 class="page-title text-truncate text-primary font-weight-medium mb-1"><?= $title; ?></h3>
        </div>
    </div>

    <div class="card border-right">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <h4 class="text-dark mb-1 w-100 text-truncate font-weight-medium">Backup Database</h4><br>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Klik tombol 'Backup' untuk mencadangkan Database Penjualan Motor dengan format <code>.sql</code></h6><br>
                    <a href="db_backup.php" class="btn btn-rounded btn-primary btn_simpan mt-3" name="btn_simpan"><i class="fas fa-arrow-circle-down"></i> Backup</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require 'layout-footer.php';
?>