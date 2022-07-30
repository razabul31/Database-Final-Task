<?php
$title = 'Tambah Transaksi';
require 'functions.php';
$db = dbConnect();
$no_faktur = 'FK/ABI/' . Date('mdi') . '/R';
$tgl = Date('Y-m-d');
$data = get_data($conn, "SELECT `motor`.`NoRangka`, NamaVarian, Warna, Harga FROM motor 
            JOIN type ON `motor`.`IdType` = `type`.`IdType`");

if (isset($_POST['btn_simpan'])) {
    if ($db->errno == 0) {
        $no_faktur = $db->escape_string($_POST['no_faktur']);
        $tgl = $db->escape_string($_POST['tgl']);
        $petugas = $db->escape_string($_SESSION['id_petugas']);
        $nm_konsumen = $db->escape_string($_POST['nm_konsumen']);
        $no_ktp = $db->escape_string($_POST['no_ktp']);
        $alamat = $db->escape_string($_POST['alamat']);
        $no_rangka = $db->escape_string($_POST['varian']);

        $query = row_array($conn, "SELECT * FROM faktur WHERE NoFaktur = '$no_faktur'");
        if ($query['NoFaktur'] == 0) {
            $query = "INSERT INTO pemilik (NoKTP, NamaPemilik, AlamatPemilik) 
                    VALUES ('$no_ktp',' $nm_konsumen',' $alamat')";
            $execute = execute($conn, $query);
            if ($execute == 1) {
                $query2 = "INSERT INTO faktur (NoFaktur, Tgl, NoKTP, NoRangka, IdPetugas) 
                    VALUES ('$no_faktur',' $tgl',' $no_ktp','$no_rangka','$petugas')";
                $execute2 = execute($conn, $query2);
                if ($execute2 == 1) {
                    header('location:transaksi.php?msg=3');
                } else {
                    header('location:transaksi.php?msg=2');
                }
            } else {
                header('location:transaksi.php?msg=2');
            }
        } else {
            header('location:transaksi.php?msg=1');
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
                            <input type="text" name="no_faktur" class="form-control" value="<?= $no_faktur; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <input type="date" name="tgl" class="form-control" value="<?= $tgl; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Konsumen</label>
                            <input type="text" name="nm_konsumen" class="form-control" maxlength="20" placeholder="Masukkan nama konsumen" required oninvalid="this.setCustomValidity('Silahkan masukkan Nama Konsumen')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="">No. KTP</label>
                            <input type="number" name="no_ktp" class="form-control" min="1" placeholder="Masukkan No. KTP Konsumen" required oninvalid="this.setCustomValidity('Silahkan masukkan No. KTP Konsumen')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" class="form-control" maxlength="30" placeholder="Masukkan alamat konsumen" required oninvalid="this.setCustomValidity('Silahkan masukkan Alamat Konsumen')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="">Varian Sepeda Motor</label>
                            <select name="varian" id="varian" class="form-control" required oninvalid="this.setCustomValidity('Silahkan pilih Varian Sepeda Motor')" oninput="setCustomValidity('')">
                                <option value="">Pilih varian sepeda motor</option>
                                <?php foreach ($data as $varian) : ?>
                                    <option value="<?= $varian['NoRangka']; ?>"><?= $varian['NamaVarian']; ?> - <?= $varian['Warna']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <select name="harga" id="harga" class="form-control">
                                <option value="">Pilih harga</option>
                                <?php foreach ($data as $varian) : ?>
                                    <option value="<?= $varian['Harga']; ?>">Rp <?= number_format($varian['Harga'], 0, ',', '.'); ?></option>
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