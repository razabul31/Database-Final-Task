<?php
$title = 'Tambah Barang';
require 'functions.php';
$db = dbConnect();

//Fungsi tambah data
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

        $query = row_array($conn, "SELECT * FROM `type` WHERE IdType = '$IdType'");
        if ($query['IdType'] == 0) {
            $query = "INSERT INTO type (IdType,NoMesin,IsiSilinder,Warna,TahunPembuatan,Harga) 
                    VALUES (' $IdType',' $nmrMesin',' $isiSilinder','$warna','$thnPembuatan','$harga')";
            $execute = execute($conn, $query);
            if ($execute == 1) {
                $query2 = "INSERT INTO motor (NoRangka, IdType, NamaVarian) 
                    VALUES ('$rangka',' $IdType',' $varian')";
                $execute2 = execute($conn, $query2);
                if ($execute2 == 1) {
                    header('location:type.php?msg=3');
                } else {
                    header('location:type.php?msg=2');
                }
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
                            <label for="">ID Type</label>
                            <input type="text" name="IdType" maxlength="14" class="form-control" required oninvalid="this.setCustomValidity('Silahkan masukkan id type')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Varian</label>
                            <input type="text" name="varian" maxlength="20" class="form-control" required oninvalid="this.setCustomValidity('Silahkan masukkan nama varian')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="">No Rangka</label>
                            <input type="text" name="rangka" class="form-control" maxlength="18" required oninvalid="this.setCustomValidity('Silahkan masukkan no. rangka')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="">No Mesin</label>
                            <input type="text" name="mesin" class="form-control" maxlength="17" required oninvalid="this.setCustomValidity('Silahkan masukkan no. mesin')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="">Isi Silinder</label>
                            <input type="text" name="silinder" class="form-control" maxlength="5" required oninvalid="this.setCustomValidity('Silahkan masukkan isi silinder')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="">Warna</label>
                            <input type="text" name="warna" class="form-control" maxlength="9" required oninvalid="this.setCustomValidity('Silahkan masukkan warna kendaraan')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="">Tahun Pembuatan</label>
                            <input type="number" name="pembuatan" class="form-control" min="1" max="9999" required oninvalid="this.setCustomValidity('Silahkan masukkan tahun pembuatan')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="number" name="harga" class="form-control" min="1" required oninvalid="this.setCustomValidity('Silahkan masukkan harga kendaraan')" oninput="setCustomValidity('')">
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