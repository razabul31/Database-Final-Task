<?php
require 'functions.php';
$NoKtp = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM pemilik WHERE NoKTP = '$NoKtp'");

if ($query) {
    header('location:pemilik.php?msg=5');
} else {
    header('location:pemilik.php?msg=2');
}
