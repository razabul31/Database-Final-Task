<?php
$title = 'Tambah Type';
require 'functions.php';
$db = dbConnect();

if (isset($_POST['btn_simpan'])) {
    if ($db->errno == 0) {
        $IdType = $db->escape_string($_POST['IdType']);
        $nmrMesin = $db->escape_string($_POST['mesin']);
        $isiSilinder = $db->escape_string($_POST['silinder']);
        $warna = $db->escape_string($_POST['warna']);
        $thnPembuatan = $db->escape_string($_POST['pembuatan']);
        $harga = $db->escape_string($_POST['harga']);


        $query = "SELECT * FROM tipe WHERE IdType = '$IdType'";
        $data = row_array($conn, $query);
        if ($data['NoKTP'] == 0) {
            $query = "INSERT INTO tipe (IdType,NoMesin,IsiSilinder,Warna,TahunPembuatan,Harga) VALUES (' $IdType',' $nmrMesin',' $isiSilinder','$warna','$thnPembuatan','$harga')";
            $execute = execute($conn, $query);
            if ($execute == 1) {
                header('location:type.php?msg=3');
            } else {
                header('location:type.php?msg=2');
            }
        } else {
            header('location:type.php?msg=1');
        }
    } else {
        header('location:type.php?msg=' . (DEVELOPMENT ? " : " . $db->connect_error : ""));
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
                            <label for="">ID TYPE</label>
                            <input type="text" name="IdType" class="form-control text-uppercase">
                        </div>
                        <div class="form-group">
                            <label for="">No Mesin</label>
                            <input type="text" name="mesin" class="form-control text-capitalize" maxlength="17" required oninvalid="this.setCustomValidity('Silahkan masukkan nama pemilik')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="">Isi Silinder</label>
                            <input type="text" name="silinder" class="form-control text-capitalize" maxlength="30" required oninvalid="this.setCustomValidity('Silahkan masukkan alamat pemilik')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="">Warna</label>
                            <input type="text" name="warna" class="form-control text-capitalize" maxlength="30" required oninvalid="this.setCustomValidity('Silahkan masukkan alamat pemilik')" oninput="setCustomValidity('')">
                        </div>

                        <div class="form-group">
                            <label for="">Tahun Pembuatan</label>
                            <input type="text" name="pembuatan" class="form-control text-capitalize" maxlength="30" required oninvalid="this.setCustomValidity('Silahkan masukkan alamat pemilik')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="text" name="harga" class="form-control text-capitalize" maxlength="30" required oninvalid="this.setCustomValidity('Silahkan masukkan alamat pemilik')" oninput="setCustomValidity('')">
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