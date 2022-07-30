<?php
$title = 'Ubah Data pemilik';
require 'functions.php';
$db = dbConnect();
$NoKTP = $_GET['id'];
$pemilik = row_array($conn, "SELECT * FROM pemilik WHERE NoKTP='$NoKTP'");

if (isset($_POST['btn_simpan'])) {
    if ($db->errno == 0) {
        $NoKTP = $db->escape_string($_POST['NoKTP']);
        $nm_pemilik = $db->escape_string($_POST['nm_pemilik']);
        $alamat = $db->escape_string($_POST['alamat']);

        $query = "UPDATE pemilik SET NoKTP ='$NoKTP', NamaPemilik='$nm_pemilik', AlamatPemilik='$alamat' WHERE NoKTP='$NoKTP'";
        $execute = execute($conn, $query);
        if ($execute == 1) {
            header('location:pemilik.php?msg=4');
        } else {
            header('location:pemilik.php?msg=2');
        }
    } else {
        header('location:pemilik.php?msg=' . (DEVELOPMENT ? " : " . $db->connect_error : ""));
    }
}

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
    <div class="row">
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="card-body font-weight">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">NoKTP</label>
                            <input type="text" name="NoKTP" class="form-control text-uppercase" value="<?= $pemilik['NoKTP']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama pemilik</label>
                            <input type="text" name="nm_pemilik" class="form-control text-capitalize" maxlength="17" value="<?= $pemilik['NamaPemilik']; ?>" required oninvalid="this.setCustomValidity('Silahkan masukkan nama pemilik')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat pemilik</label>
                            <input type="text" name="alamat" class="form-control text-capitalize" maxlength="30" value="<?= $pemilik['AlamatPemilik']; ?>" required oninvalid="this.setCustomValidity('Silahkan masukkan alamat pemilik')" oninput="setCustomValidity('')">
                        </div>


                        <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-rounded btn-dark mt-3">Kembali</a>
                        <button type="submit" class="btn btn-rounded btn-success btn_simpan mt-3" name="btn_simpan">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require 'layout-footer.php';
?>