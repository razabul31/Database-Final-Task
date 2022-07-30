<?php
require 'functions.php';
$db = dbConnect();

$no_faktur = $db->escape_string($_GET['id']);
// $faktur = row_array($conn, "SELECT * FROM faktur WHERE NoFaktur = '$no_faktur'");

$data = row_array($conn, "SELECT * FROM faktur
            JOIN pemilik ON `faktur`.`NoKTP` = `pemilik`.`NoKTP`
            JOIN motor ON `faktur`.`NoRangka` = `motor`.`NoRangka`
            JOIN type ON `type`.`IdType` = `motor`.`IdType`
            JOIN petugas ON `faktur`.`IdPetugas` = `petugas`.`IdPetugas`
            WHERE NoFaktur = '$no_faktur'");

$pdf = new FPDF('P', 'mm', 'Letter');
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'NOTA PEMBELIAN MOTOR', 0, 1, 'C');

$pdf->Line(10, 20, 200, 20);
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 11);

$pdf->Cell(20, 10, 'No. Faktur', 0, 0,);
$pdf->Cell(120, 10, ' : ' . $data['NoFaktur'], 0, 0);
$pdf->Cell(20, 10, 'Tanggal', 0, 0);
$pdf->Cell(30, 10, ' : ' . $data['Tgl'], 0, 1);
$pdf->Cell(20, 10, 'Petugas', 0, 0,);
$pdf->Cell(90, 10, ' : ' . $data['NamaPetugas'], 0, 0);

$pdf->Ln(20);
$pdf->Cell(40, 10, 'No. KTP', 0, 0);
$pdf->Cell(30, 10, ' : ' . $data['NoKTP'], 0, 1);
$pdf->Cell(40, 10, 'Pemilik', 0, 0);
$pdf->Cell(30, 10, ' : ' . $data['NamaPemilik'], 0, 1);
$pdf->Cell(40, 10, 'Alamat', 0, 0);
$pdf->Cell(30, 10, ' : ' . $data['AlamatPemilik'], 0, 1);

$pdf->Cell(40, 10, 'ID Type', 0, 0);
$pdf->Cell(30, 10, ' : ' . $data['IdType'], 0, 1);
$pdf->Cell(40, 10, 'Sepeda Motor', 0, 0);
$pdf->Cell(30, 10, ' : ' . $data['NamaVarian'], 0, 1);
$pdf->Cell(40, 10, 'No. Rangka', 0, 0);
$pdf->Cell(30, 10, ' : ' . $data['NoRangka'], 0, 1);
$pdf->Cell(40, 10, 'No. Mesin', 0, 0);
$pdf->Cell(30, 10, ' : ' . $data['NoMesin'], 0, 1);
$pdf->Cell(40, 10, 'Isi Silinder', 0, 0);
$pdf->Cell(30, 10, ' : ' . $data['IsiSilinder'], 0, 1);
$pdf->Cell(40, 10, 'Tahun Pembuatan', 0, 0);
$pdf->Cell(30, 10, ' : ' . $data['TahunPembuatan'], 0, 1);
$pdf->Cell(40, 10, 'Warna', 0, 0);
$pdf->Cell(30, 10, ' : ' . $data['Warna'], 0, 1);
$pdf->Cell(40, 10, 'Harga', 0, 0);
$pdf->Cell(30, 10, ' : ' . $data['Harga'], 0, 1);

$pdf->Ln(10);
$pdf->Cell(150, 10, '', 0, 0,);
$pdf->Cell(20, 10, 'Tanda Tangan', 0, 1);
$pdf->Ln(20);
$pdf->Cell(150, 10, '', 0, 0,);
$pdf->Cell(20, 10, $data['NamaPetugas'], 0, 1);

$pdf->Output('nota-transaksi-' . $data['NoFaktur'] . '.pdf', 'I');
