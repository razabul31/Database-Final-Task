<?php
$title = 'Dasboard';
require 'layout-header.php';
require 'layout-topbar.php';
require 'layout-sidebar.php';
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body collapse show">
            <h3 class="page-title text-truncate text-primary font-weight-medium mb-1"><?= $title; ?></h3>
        </div>
    </div>

    <div class="card-group">
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">
                                <?php
                                $query = "SELECT COUNT(NoFaktur) FROM faktur";
                                $result = row_array($conn, $query);
                                ?>
                                <?= $result['COUNT(NoFaktur)']; ?>
                            </h2>
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Transaksi</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"> <i class="fas fa-donate"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">
                            <?php
                            $query = "SELECT COUNT(NoRangka) FROM motor";
                            $result = row_array($conn, $query);
                            ?>
                            <?= $result['COUNT(NoRangka)']; ?>
                        </h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Barang</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"> <i class="fas fa-box"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">
                                <?php
                                $query = "SELECT COUNT(IdPetugas) FROM petugas";
                                $result = row_array($conn, $query);
                                ?>
                                <?= $result['COUNT(IdPetugas)']; ?>
                            </h2>
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Petugas</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"> <i class="fas fa-user"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">
                            <sup class="set-doller">Rp</sup>
                            <?php
                            $query = row_array($conn, "SELECT SUM(Harga) as total FROM faktur
                                    JOIN motor ON `faktur`.`NoRangka` = `motor`.`NoRangka`
                                    JOIN type ON `motor`.`IdType` = `type`.`IdType`");
                            ?>
                            <?= number_format($query['total']); ?>
                        </h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Pemasukan</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<?php
require 'layout-footer.php';
?>