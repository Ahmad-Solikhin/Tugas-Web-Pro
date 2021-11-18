<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}

if (isset($_GET['stat'])) {
    $stat = $_GET['stat'];
    if ($stat == 1) {
        //ambil data form
        $username = filter_data($_POST['username']);
        $password = filter_data($_POST['password']);

        //query untuk cek user ada/tidak
        $password = sha1($password);
        $sql = "select * from user where user_username = '$username' and user_password = '$password'";

        //jalankan query
        $result = mysqli_query($connection, $sql);

        $num = mysqli_num_rows($result);
        if ($num > 0) {
            //ada user
            $row = mysqli_fetch_assoc($result);

            //set session
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['nm_user'] = $row['nm_user'];
            $_SESSION['username'] = $row['user_username'];
            $_SESSION['usia'] = $row['usia'];
            $_SESSION['berat_badan'] = $row['berat_badan'];

            redirect("?page=welcome");
        } else {
            //data tidak ditemukan
            redirect("?page=login&err=1");
        }
    } elseif ($stat == 2) {
        //query untuk update session
        $id_user = $_GET['id_user'];
        $sql = "select * from user where id_user = '$id_user'";

        //jalankan query
        $result = mysqli_query($connection, $sql);

        $num = mysqli_num_rows($result);
        if ($num > 0) {
            //ada user
            $row = mysqli_fetch_assoc($result);

            //set session
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['nm_user'] = $row['nm_user'];
            $_SESSION['username'] = $row['user_username'];
            $_SESSION['usia'] = $row['usia'];
            $_SESSION['berat_badan'] = $row['berat_badan'];

            redirect("?page=akun");
        } else {
            //data tidak ditemukan
            redirect("?page=akun&err=1");
        }
    } else {
        redirect("?page=404");
    }
}
