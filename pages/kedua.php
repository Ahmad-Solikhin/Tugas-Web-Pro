<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}
?>

<h1 class="judul">From Input Olahraga</h1>
<form action="?page=save&stat=2" method="POST">
    <div class="content">
        <div class="mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Waktu</label>
            <div class="col">
                <select name="waktu_olahraga" class="form-select" aria-label="Default select example">
                    <option selected>--Pilih Waktu--</option>
                    <option value="Pagi">Pagi</option>
                    <option value="Siang">Siang</option>
                    <option value="Sore">Sore</option>
                    <option value="Malam">Malam</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Olahraga</label>
            <div class="col">
                <input type="text" name="nama_olahraga" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Kalori Terbakar</label>
            <div class="col">
                <input type="text" name="kalori_olahraga" class="form-control" placeholder="Kal" autocomplete="off">
            </div>
        </div>
        <div class="mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Jam Olahraga</label>
            <div class="col">
                <input type="time" name="waktu" class="form-control">
            </div>
        </div>
        <div class="mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Olahraga</label>
            <div class="col">
                <input type="date" name="tanggal" class="form-control">
            </div>
        </div>
        <div class="mb-3">
            <div class="col">
                <button type="submit" value="Simpan" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>