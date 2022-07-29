<?php
require 'functions.php';

$no_faktur = $_GET['id'];
$no_ktp = row_array($conn, "SELECT NoKTP FROM faktur WHERE NoFaktur = '$no_faktur'");

$query = execute($conn, "DELETE FROM faktur WHERE NoFaktur = '$no_faktur'");
if ($query == 1) {
    $query2 = execute($conn, "DELETE FROM pemilik WHERE NoKTP = '$no_ktp'");
    header('location:transaksi.php?msg=5');
} else {
    header('location:transaksi.php?msg=2');
}
