<?php
$title = 'Petugas';
require 'functions.php';
require 'layout-header.php';
require 'layout-topbar.php';
require 'layout-sidebar.php';

$data = get_data($conn, "SELECT * FROM petugas");
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
            <div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-circle"></i> Gagal menambahkan data! ID Petugas sudah tersedia.</div>
        <?php
        } else if ($msg == 2) {
        ?>
            <div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-circle"></i> Gagal! Error eksekusi.</div>
        <?php
        } else if ($msg == 3) {
        ?>
            <div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data petugas berhasil ditambahkan!</div>
        <?php
        } else if ($msg == 4) {
        ?>
            <div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data petugas berhasil diperbarui!</div>
        <?php
        } else if ($msg == 5) {
        ?>
            <div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data petugas berhasil dihapus!</div>
    <?php
        }
    }
    ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="petugas-tambah.php" class="btn btn-outline-success btn-rounded">
                            <i class="fas fa-plus"></i> Tambah Petugas
                        </a>
                        <button id="btn-refresh" class="btn btn-primary btn-rounded" title="Refresh Data"><i class="fas fa-sync-alt"></i></button>
                    </h4>
                    <br>
                    <div class="table-responsive">
                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID Petugas</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($data as $petugas) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $petugas['IdPetugas']; ?></td>
                                        <td><?= $petugas['NamaPetugas']; ?></td>
                                        <td><?= $petugas['AlamatPetugas']; ?></td>
                                        <td>
                                            <a href="petugas-ubah.php?id=<?= $petugas['IdPetugas']; ?>" title="Edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="petugas-hapus.php?id=<?= $petugas['IdPetugas']; ?>" title="Hapus" class="btn btn-danger" onclick="return confirm('Hapus data <?= $petugas['IdPetugas']; ?> ?');"><i class="fa fa-trash"></i></a>
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