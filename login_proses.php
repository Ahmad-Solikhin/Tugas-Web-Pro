<?php
    if(defined("GELANG" === false)){
        die ("Anda tidak bisa mengakses halaman ini secara langsung!");
    }


    //ambil data form
    $username = filter_data($_POST['username']);
    $password = filter_data($_POST['password']);

    //query untuk cek user ada/tidak
    $password = sha1($password);
    $sql = "select * from user where user_username = '$username' and user_password = '$password'";

    //jalankan query
    $result = mysqli_query($connection, $sql);

    $num = mysqli_num_rows($result);
    if($num > 0)
    {
        //ada user
        $row = mysqli_fetch_assoc($result);

        //set session
        $_SESSION['nm_user'] = $row['nm_user'];
        $_SESSION['username'] = $row['user_username'];
        $_SESSION['id_role'] = $row['id_role'];

        $sql = "select * from role where id_role=".$row['id_role'];
        $result = mysqli_query($connection, $sql);

        $role = mysqli_fetch_assoc($result);
        
        //additional session
        $_SESSION['nm_role'] = $role['nm_role'];
        redirect("?p=welcome");
    } 
    else 
    {
        //data tidak ditemukan
        redirect("?p=login&err=1");
    }