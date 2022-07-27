<?php
$title = 'pemilik';
require 'functions.php';
require 'layout-header.php';
require 'layout-topbar.php';
require 'layout-sidebar.php';

$data = get_data($conn, "SELECT * FROM pemilik");
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
            <div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-circle"></i> Gagal menambahkan data! ID pemilik sudah tersedia.</div>
        <?php
        } else if ($msg == 2) {
        ?>
            <div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-circle"></i> Gagal! Error eksekusi.</div>
        <?php
        } else if ($msg == 3) {
        ?>
            <div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data pemilik berhasil ditambahkan!</div>
        <?php
        } else if ($msg == 4) {
        ?>
            <div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data pemilik berhasil diperbarui!</div>
        <?php
        } else if ($msg == 5) {
        ?>
            <div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data pemilik berhasil dihapus!</div>
    <?php
        }
    }
    ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="pemilik-tambah.php" class="btn btn-outline-success btn-rounded">
                            <i class="fas fa-plus"></i> Tambah pemilik
                        </a>
                    </h4>
                    <br>
                    <div class="table-responsive">
                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NoKTP</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($data as $pemilik) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $pemilik['NoKTP']; ?></td>
                                        <td><?= $pemilik['NamaPemilik']; ?></td>
                                        <td><?= $pemilik['AlamatPemilik']; ?></td>
                                        <td>
                                            <a href="pemilik-ubah.php?id=<?= $pemilik['NoKTP']; ?>" title="Edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="pemilik-hapus.php?id=<?= $pemilik['NoKTP']; ?>" title="Hapus" class="btn btn-danger" onclick="return confirm('Hapus data <?= $pemilik['NoKTP']; ?> ?');"><i class="fa fa-trash"></i></a>
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