<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}

$nama = filter_data($_POST['nama']);
$username = filter_data($_POST['username']);
$password = filter_data($_POST['password']);
$usia = filter_data($_POST['usia']);
$berat_badan = filter_data($_POST['berat_badan']);
$konfirmasi_password = filter_data($_POST['konfirmasi_password']);

date_default_timezone_set('Asia/Jakarta');
$waktu = date("Y-m-d H:i:s");


$sql = "SELECT * FROM user WHERE deleted_at IS NULL";

$hasil = mysqli_query($connection, $sql);
$sama = false;
while ($row = mysqli_fetch_assoc($hasil)) {
    if (strtoupper($username) == strtoupper($row['user_username'])) {
        $sama = true;
    } else {
        $sama = false;
    }
}

if ($password != $konfirmasi_password) {
    redirect("?page=signup&err=1");
} elseif (strlen($password) < 8) {
    redirect("?page=signup&err=2");
} elseif (preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $password) != true) {
    redirect("?page=signup&err=3");
} elseif ($sama) {
    redirect("?page=signup&err=4");
} else {
    $data = [
        'nm_user' => $nama,
        'user_username' => $username,
        'user_password' => sha1($password),
        'created_at' => $waktu,
        'update_at' => $waktu
    ];

    insert_data($connection, "user", $data);

    redirect("?page=login&msg=2");
}
