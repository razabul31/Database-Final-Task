<?php
require 'functions.php';
$IdType = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM tipe WHERE IdType = '$IdType'");

if ($query) {
    header('location:type.php?msg=5');
} else {
    header('location:type.php?msg=2');
}
