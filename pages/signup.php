<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}
?>

<h1 class="judul">From Sign Up</h1>


<div class="container-fluid">
    <div class="row">
        <div class="col col-4"></div>
        <div class="col col-4">
            <?php
            if (isset($_GET['err'])) {
                $err = $_GET['err'];
                if ($err == 1) {
                    echo "<div class='alert alert-danger'>Password tidak sama</div>";
                } elseif ($err == 2) {
                    echo "<div class='alert alert-danger'>Password kurang dari 8 karakter</div>";
                } elseif ($err == 3) {
                    echo "<div class='alert alert-danger'>Password harus mengandung huruf dan angka</div>";
                } elseif ($err == 4) {
                    echo "<div class='alert alert-danger'>Username sudah digunakan</div>";
                }
            }
            ?>
            <form action="?page=signup_proses" method="POST">
                <div class="content">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <div class="col">
                            <input type="text" class="form-control" name="nama" autocomplete="off" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <div class="col">
                            <input type="text" class="form-control" name="username" autocomplete="off" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subscription</label>
                        <div class="col">
                            <select name="id_role" class="form-select" aria-label="Default select example">
                                <option selected>--Pilih Subscription--</option>
                                <option value="1">Biasa</option>
                                <option value="2">Premium</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="col">
                            <input type="password" class="form-control" name="password" autocomplete="off" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Konfirmasi Password</label>
                        <div class="col">
                            <input type="password" class="form-control" name="konfirmasi_password" autocomplete="off" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <div style="text-align: right;" class="col">
                            <button type="submit" value="Sign Up" class="btn btn-primary">Sign Up</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col col-4"></div>
    </div>
</div>