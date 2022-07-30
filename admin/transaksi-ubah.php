<?php
$title = 'Ubah Data Transaksi';
require 'functions.php';
$db = dbConnect();

$tgl = Date('Y-m-d');
$data = get_data($conn, "SELECT `motor`.`NoRangka`, NamaVarian, Warna, Harga FROM motor 
            JOIN type ON `motor`.`IdType` = `type`.`IdType`");

$no_faktur = $db->escape_string($_GET['id']);
$faktur = row_array($conn, "SELECT * FROM faktur WHERE NoFaktur = '$no_faktur'");

$no_ktp = $faktur['NoKTP'];
$pemilik = row_array($conn, "SELECT * FROM pemilik WHERE NoKTP = '$no_ktp'");

$no_rangka = $faktur['NoRangka'];
$type = row_array($conn, "SELECT * FROM motor
        JOIN type ON `motor`.`IdType` = `type`.`IdType`
        WHERE NoRangka = '$no_rangka'");

if (isset($_POST['btn_simpan'])) {
    if ($db->errno == 0) {
        $noFaktur = $db->escape_string($_POST['no_faktur']);
        $tgl = $db->escape_string($_POST['tgl']);
        $petugas = $db->escape_string($_SESSION['id_petugas']);
        $nm_konsumen = $db->escape_string($_POST['nm_konsumen']);
        $noKtp = $db->escape_string($_POST['no_ktp']);
        $alamat = $db->escape_string($_POST['alamat']);
        $noRangka = $db->escape_string($_POST['varian']);

        $query = "UPDATE pemilik SET NoKTP='$noKtp', NamaPemilik='$nm_konsumen', AlamatPemilik='$alamat' WHERE NoKTP='$no_ktp'";
        $execute = execute($conn, $query);
        if ($execute == 1) {
            $query2 = "UPDATE faktur SET NoFaktur='$noFaktur', Tgl='$tgl', NoKTP='$no_ktp', NoRangka='$noRangka', IdPetugas='$petugas' WHERE NoFaktur='$no_faktur'";
            $execute2 = execute($conn, $query2);
            if ($execute2 == 1) {
                header('location:transaksi.php?msg=4');
            } else {
                header('location:transaksi.php?msg=2');
            }
        } else {
            header('location:transaksi.php?msg=2');
        }
    } else {
        header('location:transaksi.php?msg=' . (DEVELOPMENT ? " : " . $db->connect_error : ""));
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
        <div class="col-lg-7 col-md-12">
            <div class="card">
                <div class="card-body font-weight">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Nomor Faktur</label>
                            <input type="text" name="no_faktur" class="form-control" value="<?= $faktur['NoFaktur']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <input type="date" name="tgl" class="form-control" value="<?= $tgl; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Konsumen</label>
                            <input type="text" name="nm_konsumen" class="form-control text-capitalize" maxlength="20" value="<?= $pemilik['NamaPemilik']; ?>" required oninvalid="this.setCustomValidity('Silahkan masukkan Nama Konsumen')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="">No. KTP</label>
                            <input type="number" name="no_ktp" class="form-control" min="1" max="15" value="<?= $pemilik['NoKTP']; ?>" required oninvalid="this.setCustomValidity('Silahkan masukkan No. KTP Konsumen')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" class="form-control text-capitalize" maxlength="30" value="<?= $pemilik['AlamatPemilik']; ?>" required oninvalid="this.setCustomValidity('Silahkan masukkan Alamat Konsumen')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="">Varian Sepeda Motor</label>
                            <select name="varian" id="varian" class="form-control" required oninvalid="this.setCustomValidity('Silahkan pilih Varian Sepeda Motor')" oninput="setCustomValidity('')">
                                <?php foreach ($data as $varian) : ?>
                                    <?php if ($varian['NoRangka'] == $type['NoRangka']) : ?>
                                        <option value="<?= $varian['NoRangka']; ?>" selected><?= $varian['NamaVarian']; ?> - <?= $varian['Warna']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $varian['NoRangka']; ?>"><?= $varian['NamaVarian']; ?> - <?= $varian['Warna']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <select name="harga" id="harga" class="form-control">
                                <?php foreach ($data as $varian) : ?>
                                    <?php if ($varian['Harga'] == $type['Harga']) : ?>
                                        <option value="<?= $varian['Harga']; ?>" selected>Rp <?= number_format($varian['Harga'], 0, ',', '.'); ?></option>
                                    <?php else : ?>
                                        <option value="<?= $varian['Harga']; ?>">Rp <?= number_format($varian['Harga'], 0, ',', '.'); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-rounded btn-dark mt-3">Kembali</a>
                        <button type="submit" class="btn btn-rounded btn-success mt-3" name="btn_simpan">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require 'layout-footer.php';
?>