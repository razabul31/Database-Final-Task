<?php
$title = 'Laporan';
require 'functions.php';
require 'layout-header.php';
require 'layout-topbar.php';
require 'layout-sidebar.php';

$data = get_data($conn, "SELECT * FROM faktur
            JOIN pemilik ON `faktur`.`NoKTP` = `pemilik`.`NoKTP`
            JOIN motor ON `faktur`.`NoRangka` = `motor`.`NoRangka`
            JOIN type ON `motor`.`IdType` = `type`.`IdType`");
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body collapse show">
            <h3 class="page-title text-truncate text-primary font-weight-medium"><?= $title; ?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No. Faktur</th>
                                    <th>Tanggal</th>
                                    <th>Konsumen</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($data as $faktur) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $faktur['NoFaktur']; ?></td>
                                        <td><?= $faktur['Tgl']; ?></td>
                                        <td><?= $faktur['NamaPemilik']; ?></td>
                                        <td>Rp <?= number_format($faktur['Harga'], 0, ',', '.'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
require 'layout-footer.php';
?>