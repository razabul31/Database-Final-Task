<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$title = 'Barang';
require 'functions.php';
require 'layout-header.php';
require 'layout-topbar.php';
require 'layout-sidebar.php';

$data = get_data($conn, "SELECT * FROM type
            JOIN motor ON `type`.`IdType` = `motor`.`IdType`");
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
            <div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-circle"></i> Gagal menambahkan data! ID Type sudah tersedia.</div>
        <?php
        } else if ($msg == 2) {
        ?>
            <div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-circle"></i> Gagal! Data ini terpakai pada Data Motor.</div>
        <?php
        } else if ($msg == 3) {
        ?>
            <div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Barang berhasil ditambahkan!</div>
        <?php
        } else if ($msg == 4) {
        ?>
            <div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Barang berhasil diperbarui!</div>
        <?php
        } else if ($msg == 5) {
        ?>
            <div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Barang berhasil dihapus!</div>
    <?php
        }
    }
    ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="type-tambah.php" class="btn btn-outline-success btn-rounded">
                            <i class="fas fa-plus"></i> Tambah Barang
                        </a>
                        <button id="btn-refresh" class="btn btn-primary btn-rounded" title="Refresh Data"><i class="fas fa-sync-alt"></i></button>
                    </h4>
                    <br>
                    <div class="table-responsive">
                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID Type</th>
                                    <th>Nama Varian</th>
                                    <th>Isi Silinder</th>
                                    <th>Warna</th>
                                    <th>Tahun Pembuatan</th>
                                    <th>Harga</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($data as $type) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $type['IdType']; ?></td>
                                        <td><?= $type['NamaVarian']; ?></td>
                                        <td><?= $type['IsiSilinder']; ?></td>
                                        <td><?= $type['Warna']; ?></td>
                                        <td><?= $type['TahunPembuatan']; ?></td>
                                        <td>Rp <?= number_format($type['Harga'], 0, ',', '.'); ?></td>
                                        <td>
                                            <a href="type-ubah.php?id=<?= $type['IdType']; ?>" title="Edit" class="btn btn-warning mt-1"><i class="fa fa-edit"></i></a>
                                            <a href="type-hapus.php?id=<?= $type['IdType']; ?>" title="Hapus" class="btn btn-danger mt-1" onclick="return confirm('Hapus data <?= $type['IdType']; ?> ?');"><i class="fa fa-trash"></i></a>
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