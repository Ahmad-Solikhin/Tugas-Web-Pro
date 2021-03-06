<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}

if (isset($_GET['stat'])) {
    $stat = $_GET['stat'];
    if ($stat == 1) {
        $jenis_makanan = filter_data($_POST['jenis_makanan']);
        $nama_makanan = filter_data($_POST['nama_makanan']);
        $kalori_makanan = filter_data($_POST['kalori_makanan']);
        $waktu = filter_data($_POST['waktu']);
        $tanggal = date('Y-m-d', strtotime(filter_data($_POST['tanggal'])));


        $data = [
            'jenis_makanan' => $jenis_makanan,
            'nama_makanan' => $nama_makanan,
            'kalori_makanan' => $kalori_makanan,
            'waktu' => $waktu,
            'tanggal' => $tanggal,
            'id_user' => $_SESSION['id_user']
        ];

        insert_data($connection, "data", $data);

        redirect('?page=tabel');
    } elseif ($stat == 2) {
        $waktu_olahraga = filter_data($_POST['waktu_olahraga']);
        $nama_olahraga = filter_data($_POST['nama_olahraga']);
        $kalori_olahraga = filter_data($_POST['kalori_olahraga']);
        $waktu = filter_data($_POST['waktu']);
        $tanggal = date('Y-m-d', strtotime(filter_data($_POST['tanggal'])));


        $data = [
            'waktu_olahraga' => $waktu_olahraga,
            'nama_olahraga' => $nama_olahraga,
            'kalori_olahraga' => $kalori_olahraga,
            'waktu' => $waktu,
            'tanggal' => $tanggal,
            'id_user' => $_SESSION['id_user']
        ];

        insert_data($connection, "olahraga", $data);

        redirect('?page=tabel_olahraga');
    } elseif ($stat == 3) {
        # code...
    } else {
        redirect('?page=welcome');
    }
}
