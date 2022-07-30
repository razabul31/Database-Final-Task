<?php
$title = 'Konsumen';
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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No. KTP</th>
                                    <th>Nama Konsumen</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($data as $konsumen) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $konsumen['NoKTP']; ?></td>
                                        <td><?= $konsumen['NamaPemilik']; ?></td>
                                        <td><?= $konsumen['AlamatPemilik']; ?></td>
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