<?php

//Fungsi ubah
$title = 'Ubah Data Barang';
require 'functions.php';
$db = dbConnect();
$Id = $_GET['id'];
$motor = row_array($conn, "SELECT * FROM motor WHERE IdType='$Id'");

$no_rangka = $motor['NoRangka'];
$type = row_array($conn, "SELECT * FROM motor
        JOIN type ON `motor`.`IdType` = `type`.`IdType`
        WHERE NoRangka = '$no_rangka'");

if (isset($_POST['btn_simpan'])) {
    if ($db->errno == 0) {
        $IdType = $db->escape_string($_POST['IdType']);
        $rangka = $db->escape_string($_POST['rangka']);
        $varian = $db->escape_string($_POST['varian']);
        $nmrMesin = $db->escape_string($_POST['mesin']);
        $isiSilinder = $db->escape_string($_POST['silinder']);
        $warna = $db->escape_string($_POST['warna']);
        $thnPembuatan = $db->escape_string($_POST['pembuatan']);
        $harga = $db->escape_string($_POST['harga']);

        $query = "UPDATE type SET NoMesin='$nmrMesin', IsiSilinder='$isiSilinder', Warna='$warna',TahunPembuatan ='$thnPembuatan', Harga='$harga' WHERE IdType='$IdType'";
        $execute = execute($conn, $query);
        if ($execute == 1) {
            $query2 = "UPDATE motor SET NoRangka='$rangka', NamaVarian='$varian' WHERE NoRangka='$rangka'";
            $execute2 = execute($conn, $query2);
            if ($execute2 == 1) {
                header('location:type.php?msg=4');
            } else {
                header('location:type.php?msg=2');
            }
        } else {
            header('location:type.php?msg=2');
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
                            <label for="">ID TypE</label>
                            <input type="text" name="IdType" class="form-control text-uppercase" value="<?= $type['IdType']; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Nama Varian</label>
                            <input type="text" name="varian" maxlength="20" class="form-control" value="<?= $motor['NamaVarian']; ?>" required oninvalid="this.setCustomValidity('Silahkan masukkan nama varian')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="">No Rangka</label>
                            <input type="text" name="rangka" class="form-control" maxlength="18" value="<?= $motor['NoRangka']; ?>"required oninvalid="this.setCustomValidity('Silahkan masukkan no. rangka')" oninput="setCustomValidity('')">
                        </div>

                        <div class="form-group">
                            <label for="">No Mesin</label>
                            <input type="text" name="mesin" class="form-control text-capitalize" maxlength="17" value="<?= $type['NoMesin']; ?>" required oninvalid="this.setCustomValidity('Silahkan masukkan nama pemilik')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="">Isi Silinder</label>
                            <input type="text" name="silinder" class="form-control text-capitalize" maxlength="30" value="<?= $type['IsiSilinder']; ?>" required oninvalid="this.setCustomValidity('Silahkan masukkan alamat pemilik')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="">Warna</label>
                            <input type="text" name="warna" class="form-control text-capitalize" maxlength="30" value="<?= $type['Warna']; ?>" required oninvalid="this.setCustomValidity('Silahkan masukkan alamat pemilik')" oninput="setCustomValidity('')">
                        </div>

                        <div class="form-group">
                            <label for="">Tahun Pembuatan</label>
                            <input type="number" name="pembuatan" class="form-control text-capitalize" maxlength="30" value="<?= $type['TahunPembuatan']; ?>" required oninvalid="this.setCustomValidity('Silahkan masukkan alamat pemilik')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="number" name="harga" class="form-control text-capitalize" maxlength="30" value="<?= $type['Harga']; ?>" required oninvalid="this.setCustomValidity('Silahkan masukkan alamat pemilik')" oninput="setCustomValidity('')">
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
