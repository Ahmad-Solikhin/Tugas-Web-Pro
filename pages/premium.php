<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}
?>

<h1 class="judul">Indeks Masa Tubuh</h1>

<div class="container-fluid">

    <?php
    $nilai = null;
    if (isset($_POST['hitung'])) {
        $berat = $_POST['berat'];
        $tinggi = $_POST['tinggi'];
        //Hitung Indeks
        $nilai = indeks_count($berat, $tinggi);
    ?>
        <div class="row">
            <div class="col col-4"></div>
            <div class="col col-4">
                <form method="POST">
                    <div class="content">
                        <div class="mb-3">
                            <label class="form-label">Berat Badan</label>
                            <div class="col">
                                <input type="text" class="form-control" name="berat" autocomplete="off" placeholder="<?php echo $berat; ?>" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tinggi Badan</label>
                            <div class="col">
                                <input type="text" class="form-control" name="tinggi" autocomplete="off" placeholder="<?php echo $tinggi; ?>" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <div style="text-align: right;" class="col">
                                <button type="submit" value="Hitung" name="hitung" class="btn btn-primary">Hitung</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col col-4"></div>
        </div>
    <?php
    } else {
        //Hitung indeks dari data profile
        $nilai = indeks_count($_SESSION['berat_badan'], $_SESSION['tinggi_badan']);
    ?>
        <div class="row">
            <div class="col col-4"></div>
            <div class="col col-4">
                <form method="POST">
                    <div class="content">
                        <div class="mb-3">
                            <label class="form-label">Berat Badan</label>
                            <div class="col">
                                <input type="text" class="form-control" name="berat" autocomplete="off" placeholder="<?php echo $_SESSION['berat_badan']; ?>" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tinggi Badan</label>
                            <div class="col">
                                <input type="text" class="form-control" name="tinggi" autocomplete="off" placeholder="<?php echo $_SESSION['tinggi_badan']; ?>" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <div style="text-align: right;" class="col">
                                <button type="submit" value="Hitung" name="hitung" class="btn btn-primary">Hitung</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col col-4"></div>
        </div>
    <?php
    }
    ?>
    <br>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <p style="color:white;">Hasil nilai IMT Anda adalah : <b><?php echo round($nilai, 2); ?></b></p>
            <p style="color:white;">Anda dinyatakan : <b><?php echo cek_imt($nilai); ?></b></p>
        </div>
        <div class="col-4"></div>
    </div>
</div>