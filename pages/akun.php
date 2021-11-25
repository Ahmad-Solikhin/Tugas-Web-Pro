<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}

?>
<div class="container-fluid">
    <div class="row">
        <div class="col col-11">
            <h1 class="judul">Selamat Datang BRO</h1>
            <?php
            if (isset($_GET['err'])) {
                $err = $_GET['err'];
                if ($err == 1) {
                    echo "<div class='alert alert-danger' style='text-align: center;'>Edit gagal</div>";
                }
            }
            ?>
        </div>
        <div class="col col-1"></div>
    </div>
    <br>
    <div class="row">
        <div class="col col-4"></div>
        <div class="col col-1">
            <p class="profil-title">Nama</p>
        </div>
        <div class="col col-3">
            <p class="profile-child">: <?php echo $_SESSION['nm_user']; ?></p>
        </div>
        <div class="col col-4"></div>
    </div>
    <div class="row">
        <div class="col col-4"></div>
        <div class="col col-1">
            <p class="profil-title">Username</p>
        </div>
        <div class="col col-3">
            <p class="profile-child">: <?php echo $_SESSION['username']; ?></p>
        </div>
        <div class="col col-4"></div>
    </div>
    <div class="row">
        <div class="col col-4"></div>
        <div class="col col-1">
            <p class="profil-title">Usia</p>
        </div>
        <div class="col col-3">
            <p class="profile-child">: <?php echo $_SESSION['usia']; ?> Tahun</p>
        </div>
        <div class="col col-4"></div>
    </div>
    <div class="row">
        <div class="col col-4"></div>
        <div class="col col-1">
            <p class="profil-title">Tinggi Badan</p>
        </div>
        <div class="col col-3">
            <p class="profile-child">: <?php echo $_SESSION['tinggi_badan']; ?> CM</p>
        </div>
        <div class="col col-4"></div>
    </div>
    <div class="row">
        <div class="col col-4"></div>
        <div class="col col-1">
            <p class="profil-title">Berat Badan</p>
        </div>
        <div class="col col-3">
            <p class="profile-child">: <?php echo $_SESSION['berat_badan']; ?> KG</p>
        </div>
        <div class="col col-4"></div>
    </div>
    <div class="row">
        <div class="col col-4"></div>
        <div class="col col-1">
            <p class="profil-title">Status</p>
        </div>
        <div class="col col-3">
            <p class="profile-child">: <?php echo $_SESSION['nm_role']; ?></p>
        </div>
        <div class="col col-4"></div>
    </div>
    <div class="row">
        <div class="col col-4"></div>
        <div class="col col-1">
            <a href="?page=edit&stat=3&id_user=<?php echo $_SESSION['id_user']; ?>" class="btn btn-info btn-sm">Edit profil</a>
        </div>
        <div class="col col-7"></div>
    </div>
</div>