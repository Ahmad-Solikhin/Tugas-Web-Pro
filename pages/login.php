<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}
?>

<h1 class="judul">From Login</h1>


<div class="container-fluid">
    <div class="row">
        <div class="col col-4"></div>
        <div class="col col-4">
            <?php
            if (isset($_GET['err'])) {
                $err = $_GET['err'];
                if ($err == 1) {
                    echo "<div class='alert alert-danger'>Username atau password Anda salah!</div>";
                } else if ($err == 2) {
                    echo "<div class='alert alert-danger'>Silahkan login terlebih dahulu</div>";
                }
            }

            if (isset($_GET['msg'])) {
                $msg = $_GET['msg'];
                if ($msg == 1) {
                    echo "<div class='alert alert-success'>Proses logout berhasil!</div>";
                } elseif ($msg == 2) {
                    echo "<div class='alert alert-success'>Proses sign up berhasil!</div>";
                }
            }
            ?>
            <form action="?page=login_proses&stat=1" method="POST">
                <div class="content">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <div class="col">
                            <input type="text" class="form-control" name="username" autocomplete="off" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="col">
                            <input type="password" class="form-control" name="password" autocomplete="off" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <div style="text-align: right;" class="col">
                            <button type="submit" value="Login" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col col-4"></div>
    </div>
</div>