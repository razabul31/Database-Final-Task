<?php
require 'functions.php';
$varian = 0;
if (isset($_POST['varian'])) {
    $varian = $_POST['varian'];
}
$data = array();
if ($varian > 0) {
    $sql = mysqli_query($conn, "SELECT * FROM `motor`
            JOIN `type` ON `motor`.`IdType` = `type`.`IdType`
            WHERE `motor`.`NoRangka` = '$varian'");
    while ($row = mysqli_fetch_array($sql)) {
        $harga = $row['Harga'];
        $data[] = array(
            "harga" => $harga
        );
    }
}
echo json_encode($data);
