<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}

$nama = filter_data($_POST['nama']);
$username = filter_data($_POST['username']);
$password = filter_data($_POST['password']);
$konfirmasi_password = filter_data($_POST['konfirmasi_password']);

if ($password != $konfirmasi_password) {
    redirect("?page=signup&err=1");
} else {
    redirect("?page=login&msg=2");
}
