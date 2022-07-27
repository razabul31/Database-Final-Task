<?php
$title = 'Tambah pemilik';
require 'functions.php';
$db = dbConnect();

if (isset($_POST['btn_simpan'])) {
    if ($db->errno == 0) {
        $NoKTP = $db->escape_string($_POST['NoKTP']);
        $nm_pemilik = $db->escape_string($_POST['nm_pemilik']);
        $alamat = $db->escape_string($_POST['alamat']);
       

        $query = "SELECT * FROM pemilik WHERE NoKTP = '$NoKTP'";
        $data = row_array($conn, $query);
        if ($data['NoKTP'] == 0) {
            $query = "INSERT INTO pemilik (NoKTP,NamaPemilik,AlamatPemilik) VALUES ('$NoKTP','$nm_pemilik','$alamat')";
            $execute = execute($conn, $query);
            if ($execute == 1) {
                header('location:pemilik.php?msg=3');
            } else {
                header('location:pemilik.php?msg=2');
            }
        } else {
            header('location:pemilik.php?msg=1');
        }
    } else {
        header('location:pemilik.php?msg=' . (DEVELOPMENT ? " : " . $db->connect_error : ""));
    }
}

require 'layout-header.php';
require 'layout-topbar.php';
require 'layout-sidebar.php';
?>

<div class="row">
    <div class="col-lg-6 col-md-12 ml-3 my-3">
        <div class="card">
            <div class="card-body font-weight">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">NIK</label>
                        <input type="text" name="NoKTP" class="form-control text-uppercase" placeholder="Masukkan NIK" required oninvalid="this.setCustomValidity('Silahkan masukkan id pemilik')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="">Nama pemilik</label>
                        <input type="text" name="nm_pemilik" class="form-control text-capitalize" maxlength="17" placeholder="Masukkan Nama pemilik" required oninvalid="this.setCustomValidity('Silahkan masukkan nama pemilik')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat pemilik</label>
                        <input type="text" name="alamat" class="form-control text-capitalize" maxlength="30" placeholder="Masukkan Alamat pemilik" required oninvalid="this.setCustomValidity('Silahkan masukkan alamat pemilik')" oninput="setCustomValidity('')">
                    </div>
                    

                    <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-rounded btn-dark mt-3">Kembali</a>
                    <button type="submit" class="btn btn-rounded btn-success btn_simpan mt-3" name="btn_simpan">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require 'layout-footer.php';
?>