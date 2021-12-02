<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$id_user = $_SESSION['id_user'];
$no = 1;
$no1 = 1;
$baris1 = 3;
$baris2 = 3;
$total_kal = 0;
$total_ol = 0;
//pagination
$limit = 2;

//pagination
$result = mysqli_query($connection, "SELECT * FROM data WHERE delete_stat='0' AND id_user=$id_user");
$jumlah_data = mysqli_num_rows($result);
$hal_kal = ceil($jumlah_data / $limit);
$hal_aktif = (isset($_GET["hal"])) ? $_GET["hal"] : 1;
$mulai = ($limit * $hal_aktif) - $limit;
// var_dump($hal_aktif);
// var_dump($hal);
// var_dump($jumlah_data);
$sql = "SELECT * FROM data WHERE delete_stat='0' AND id_user=$id_user LIMIT $mulai, $limit";
$hasil = mysqli_query($connection, $sql);

//pagination
$result1 = mysqli_query($connection, "SELECT * FROM olahraga WHERE delete_stat='0' AND id_user=$id_user");
$jumlah_data1 = mysqli_num_rows($result1);
$hal_ol = ceil($jumlah_data1 / $limit);
$hal_aktif1 = (isset($_GET["hal"])) ? $_GET["hal"] : 1;
$mulai1 = ($limit * $hal_aktif1) - $limit;
// var_dump($hal_aktif);
// var_dump($hal);
// var_dump($jumlah_data);
$sql = "SELECT * FROM olahraga WHERE delete_stat='0' AND id_user=$id_user LIMIT $mulai1, $limit";
$hasil1 = mysqli_query($connection, $sql);

$sheet->setCellValue("C1", "Tabel Kalori");
$sheet->setCellValue("J1", "Tabel Olahraga");

$sheet->setCellValue("A2", "No.");
$sheet->setCellValue("B2", "Waktu Makan");
$sheet->setCellValue("C2", "Nama Makanan");
$sheet->setCellValue("D2", "Kalori");
$sheet->setCellValue("E2", "Jam Makan");
$sheet->setCellValue("F2", "Tanggal");

$sheet->setCellValue("H2", "No.");
$sheet->setCellValue("I2", "Waktu Makan");
$sheet->setCellValue("J2", "Nama Makanan");
$sheet->setCellValue("K2", "Kalori");
$sheet->setCellValue("L2", "Jam Makan");
$sheet->setCellValue("M2", "Tanggal");

while ($row = mysqli_fetch_assoc($hasil)) {
    $sheet->setCellValue("A" . $baris1, $no);
    $sheet->setCellValue("B" . $baris1, $row['jenis_makanan']);
    $sheet->setCellValue("C" . $baris1, $row['nama_makanan']);
    $sheet->setCellValue("D" . $baris1, $row['kalori_makanan']);
    $sheet->setCellValue("E" . $baris1, $row['waktu']);
    $sheet->setCellValue("F" . $baris1, date('d-m-Y', strtotime($row['tanggal'])));

    $total_kal += $row['kalori_makanan'];
    $baris1++;
    $no++;
}

while ($row = mysqli_fetch_assoc($hasil1)) {
    $sheet->setCellValue("H" . $baris2, $no1);
    $sheet->setCellValue("I" . $baris2, $row['waktu_olahraga']);
    $sheet->setCellValue("J" . $baris2, $row['nama_olahraga']);
    $sheet->setCellValue("K" . $baris2, $row['kalori_olahraga']);
    $sheet->setCellValue("L" . $baris2, $row['waktu']);
    $sheet->setCellValue("M" . $baris2, date('d-m-Y', strtotime($row['tanggal'])));

    $total_ol += $row['kalori_olahraga'];
    $baris2++;
    $no1++;
}

if ($baris1 > $baris2) {
    $sheet->setCellValue("A" . $baris1, "Total Kalori Makanan : " . $total_kal);
    $sheet->setCellValue("H" . $baris1, "Total Kalori Terbakar : " . $total_ol);
    $sheet->setCellValue("F" . $baris1 + 1, "Total Kalori : " . $total_kal - $total_ol);
} else {
    $sheet->setCellValue("A" . $baris2, "Total Kalori Makanan : " . $total_kal);
    $sheet->setCellValue("H" . $baris2, "Total Kalori Terbakar : " . $total_ol);
    $sheet->setCellValue("F" . $baris2 + 1, "Total Kalori : " . $total_kal - $total_ol);
}
$nama = $_SESSION['nm_user'];
$writer = new Xlsx($spreadsheet);
$writer->save("Kombinasi $nama.xlsx");

redirect('?page=tabel_kombinasi');
