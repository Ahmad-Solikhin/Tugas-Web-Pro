<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}
?>

<h1 class="judul">From Input Kalori</h1>
<form action="?page=save&stat=1" method="POST">
    <div class="content">
        <div class="mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Waktu</label>
            <div class="col">
                <select name="jenis_makanan" class="form-select" aria-label="Default select example">
                    <option selected>--Pilih Jenis--</option>
                    <option value="Sarapan">Sarapan</option>
                    <option value="Makan Siang">Makan Siang</option>
                    <option value="Makan Malam">Makan Malam</option>
                    <option value="Camilan">Cemilan</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Maknan</label>
            <div class="col">
                <input type="text" name="nama_makanan" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Kalori</label>
            <div class="col">
                <input type="text" name="kalori_makanan" class="form-control" placeholder="Kal" autocomplete="off">
            </div>
        </div>
        <div class="mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Jam Makan</label>
            <div class="col">
                <input type="time" name="waktu" class="form-control">
            </div>
        </div>
        <div class="mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Makan</label>
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