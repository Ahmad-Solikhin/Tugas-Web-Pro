<?php
    if(defined("GELANG" === false)){
        die ("Anda tidak bisa mengakses halaman ini secara langsung!");
    }
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Login</h1>
</div>

<?php
    if(isset($_GET['err']))
    {
        $err = $_GET['err'];
        if($err == 1)
        {
            echo "<div class='alert alert-danger'>Username atau password Anda salah!</div>";
            
        }
        // else if($err == 2)
        // {
        //     echo "<div class='alert alert-danger'>Silahkan login terlebih dahulu</div>";
        // }
    }

    if(isset($_GET['msg']))
    {
        $err = $_GET['msg'];
        if($err == 1)
        {
            echo "<div class='alert alert-success'>Proses logout berhasil!</div>";
            
        }
    }
?>

<form action="?p=login_proses" method="post">
    <div class="mb-3 row">
        <label class="form-label">Username</label>
        <div class="col-3">
            <input type="text" class="form-control" name="username" autocomplete="off"/>
        </div>
    </div>
    <div class="mb-3 row">
        <label class="form-label">Password</label>
        <div class="col-3">
            <input type="password" class="form-control" name="password" autocomplete="off"/>
        </div>
    </div>
    <input type="submit" value="Login" class="btn btn-primary"/>
</form>