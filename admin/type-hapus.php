<?php
require 'functions.php';

//fungsi menghapus

$idType = $_GET['id'];
$query = execute($conn, "DELETE FROM type WHERE IdType = '$idType'");
if ($query == 1) {
    $query2 = execute($conn, "DELETE FROM motor WHERE IdType = '$idType'");
    header('location:type.php?msg=5');
} else {
    header('location:type.php?msg=2');
}
