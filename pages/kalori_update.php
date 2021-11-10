<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}

$id_data = $_GET['id_data'];

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

update_data($connection, "data", $data, $id_data, "id_data");

redirect('?page=tabel');
