<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}

$jenis_makanan = $_POST['jenis_makanan'];
$nama_makanan = $_POST['nama_makanan'];
$kalori_makanan = $_POST['kalori_makanan'];
$waktu = $_POST['waktu'];
$tanggal = date('Y-m-d', strtotime($_POST['tanggal']));


$data = [
    'jenis_makanan' => $jenis_makanan,
    'nama_makanan' => $nama_makanan,
    'kalori_makanan' => $kalori_makanan,
    'waktu' => $waktu,
    'tanggal' => $tanggal
];

insert_data($connection, "data", $data);

redirect('?page=tabel');
