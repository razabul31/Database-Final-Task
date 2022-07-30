<?php
$title = 'Transaksi';
require 'functions.php';
require 'layout-header.php';
require 'layout-topbar.php';
require 'layout-sidebar.php';

$data = get_data($conn, "SELECT * FROM faktur
            JOIN pemilik ON `faktur`.`NoKTP` = `pemilik`.`NoKTP`
            JOIN motor ON `faktur`.`NoRangka` = `motor`.`NoRangka`
            JOIN petugas ON `faktur`.`IdPetugas` = `petugas`.`IdPetugas`");
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body collapse show">
            <h3 class="page-title text-truncate text-primary font-weight-medium mb-1"><?= $title; ?></h3>
        </div>
    </div>
    <?php if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        if ($msg == 1) {
    ?>
            <div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-circle"></i> Gagal menambahkan data! No. Faktur sudah tersedia.</div>
        <?php
        } else if ($msg == 2) {
        ?>
            <div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-circle"></i> Gagal! Error eksekusi.</div>
        <?php
        } else if ($msg == 3) {
        ?>
            <div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data transaksi berhasil ditambahkan!</div>
        <?php
        } else if ($msg == 4) {
        ?>
            <div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data transaksi berhasil diperbarui!</div>
        <?php
        } else if ($msg == 5) {
        ?>
            <div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data transaksi berhasil dihapus!</div>
        <?php
        } else {
        ?>
            <div class="alert alert-warning" role="alert"><i class="fas fa-exclamation-circle"></i><?= $_GET['msg']; ?></div>
    <?php
        }
    }
    ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="transaksi-tambah.php" class="btn btn-outline-success btn-rounded">
                            <i class="fas fa-plus"></i> Tambah Transaksi
                        </a>
                        <button id="btn-refresh" class="btn btn-primary btn-rounded" title="Refresh Data"><i class="fas fa-sync-alt"></i></button>
                    </h4>
                    <br>
                    <div class="table-responsive">
                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No. Faktur</th>
                                    <th>Tanggal</th>
                                    <th>Konsumen</th>
                                    <th>Sepeda Motor</th>
                                    <th>Petugas</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($data as $transaksi) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $transaksi['NoFaktur']; ?></td>
                                        <td><?= $transaksi['Tgl']; ?></td>
                                        <td><?= $transaksi['NamaPemilik']; ?></td>
                                        <td><?= $transaksi['NamaVarian']; ?></td>
                                        <td><?= $transaksi['NamaPetugas']; ?></td>
                                        <td>
                                            <a href="transaksi-ekspor.php?id=<?= $transaksi['NoFaktur']; ?>" title="Cetak" class="btn btn-primary mt-1"><i class="fa fa-print"></i></a>
                                            <a href="transaksi-ubah.php?id=<?= $transaksi['NoFaktur']; ?>" title="Edit" class="btn btn-warning mt-1"><i class="fa fa-edit"></i></a>
                                            <a href="transaksi-hapus.php?id=<?= $transaksi['NoKTP']; ?>" title="Hapus" class="btn btn-danger mt-1" onclick="return confirm('Hapus data <?= $transaksi['NoFaktur']; ?>?');"><i class="fa fa-trash"></i></a>
                                        </td>
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