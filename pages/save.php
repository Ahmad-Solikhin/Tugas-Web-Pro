<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}

if (isset($_GET['stat'])) {
    $stat = $_GET['stat'];
    if ($stat == 1) {
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
    } elseif ($stat == 2) {
        $waktu_olahraga = $_POST['waktu_olahraga'];
        $nama_olahraga = $_POST['nama_olahraga'];
        $kalori_olahraga = $_POST['kalori_olahraga'];
        $waktu = $_POST['waktu'];
        $tanggal = date('Y-m-d', strtotime($_POST['tanggal']));


        $data = [
            'waktu_olahraga' => $waktu_olahraga,
            'nama_olahraga' => $nama_olahraga,
            'kalori_olahraga' => $kalori_olahraga,
            'waktu' => $waktu,
            'tanggal' => $tanggal
        ];

        insert_data($connection, "olahraga", $data);

        redirect('?page=tabel_olahraga');
    }
}
