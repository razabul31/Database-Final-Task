<?php
require 'functions.php';

$no_ktp = $_GET['id'];
$query = execute($conn, "DELETE FROM faktur WHERE NoKTP = '$no_ktp'");
if ($query == 1) {
    $query2 = execute($conn, "DELETE FROM pemilik WHERE NoKTP = '$no_ktp'");
    header('location:transaksi.php?msg=5');
} else {
    header('location:transaksi.php?msg=2');
}
