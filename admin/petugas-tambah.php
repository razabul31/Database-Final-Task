<?php
$title = 'Tambah Petugas';
require 'functions.php';
$db = dbConnect();

if (isset($_POST['btn_simpan'])) {
    if ($db->errno == 0) {
        $id_petugas = $db->escape_string($_POST['id_petugas']);
        $nm_petugas = $db->escape_string($_POST['nm_petugas']);
        $alamat = $db->escape_string($_POST['alamat']);
        $password = $db->escape_string($_POST['password']);

        $query = "SELECT * FROM petugas WHERE IdPetugas = '$id_petugas'";
        $data = row_array($conn, $query);
        if ($data['IdPetugas'] == 0) {
            $query = "INSERT INTO petugas (IdPetugas,NamaPetugas,AlamatPetugas,Password) VALUES ('$id_petugas','$nm_petugas','$alamat','$password')";
            $execute = execute($conn, $query);
            if ($execute == 1) {
                header('location:petugas.php?msg=3');
            } else {
                header('location:petugas.php?msg=2');
            }
        } else {
            header('location:petugas.php?msg=1');
        }
    } else {
        header('location:petugas.php?msg=' . (DEVELOPMENT ? " : " . $db->connect_error : ""));
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
                        <label for="">ID Petugas</label>
                        <input type="text" name="id_petugas" class="form-control text-uppercase" placeholder="Masukkan ID Petugas" required oninvalid="this.setCustomValidity('Silahkan masukkan id petugas')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Petugas</label>
                        <input type="text" name="nm_petugas" class="form-control text-capitalize" maxlength="17" placeholder="Masukkan Nama Petugas" required oninvalid="this.setCustomValidity('Silahkan masukkan nama petugas')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Petugas</label>
                        <input type="text" name="alamat" class="form-control text-capitalize" maxlength="30" placeholder="Masukkan Alamat Petugas" required oninvalid="this.setCustomValidity('Silahkan masukkan alamat petugas')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" maxlength="15" placeholder="Masukkan password" required oninvalid="this.setCustomValidity('Silahkan masukkan password')" oninput="setCustomValidity('')">
                            <div class="input-group-append">
                                <span id="eye-button" onclick="change()" class="input-group-text">
                                    <i class="fas fa-fw fa-eye" title="tampilkan password"></i>
                                </span>
                            </div>
                        </div>
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