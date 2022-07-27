<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'penjualan_motor');

$username = $db->escape_string($_POST['username']);
$password = $db->escape_string($_POST['password']);
$query = "SELECT * FROM petugas WHERE IdPetugas = '$username'";
$row = mysqli_query($db, $query);
$data = mysqli_fetch_assoc($row);

if ($db->errno == 0) {
    if (isset($_POST["btn_login"])) {
        if ($data) {
            if ($password == $data['Password']) {
                $_SESSION['id_petugas'] = $data['IdPetugas'];
                $_SESSION['nm_petugas'] = $data['NamaPetugas'];
                header('location:admin/index.php');
            } else {
                header('location:index.php?msg=4');
            }
        } else {
            header('location:index.php?msg=3');
        }
    } else {
        header('location:index.php?msg=2');
    }
} else {
    header('location:index.php?msg=1');
}
