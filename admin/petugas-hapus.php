<?php
require 'functions.php';
$id_petugas = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM petugas WHERE IdPetugas = '$id_petugas'");

if ($query) {
    header('location:petugas.php?msg=5');
} else {
    header('location:petugas.php?msg=2');
}
