<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}
?>
<h1 class="judul">Edit Data</h1>
<?php
$id_data = $_GET['id_data'];
$sql = "select * from data where id_data=$id_data";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);

?>
<form action="?page=kalori_update&id_data=<?php echo $row['id_data'] ?>" method="POST">
    <div class="content">
        <div class="mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Waktu</label>
            <div class="col-sm-10">
                <select name="jenis_makanan" class="form-select" aria-label="Default select example">
                    <option selected><?php echo $row['jenis_makanan']; ?></option>
                    <option value="Sarapan">Sarapan</option>
                    <option value="Makan Siang">Makan Siang</option>
                    <option value="Makan Malam">Makan Malam</option>
                    <option value="Camilan">Cemilan</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Maknan</label>
            <div class="col-sm-10">
                <input type="text" name="nama_makanan" class="form-control" value="<?php echo $row['nama_makanan']; ?>">
            </div>
        </div>
        <div class="mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Kalori</label>
            <div class="col-sm-10">
                <input type="text" name="kalori_makanan" class="form-control" value="<?php echo $row['kalori_makanan']; ?>">
            </div>
        </div>
        <div class="mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Jam Makan</label>
            <div class="col-sm-10">
                <input type="time" name="waktu" class="form-control" value="<?php echo $row['waktu']; ?>">
            </div>
        </div>
        <div class="mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Makan</label>
            <div class="col-sm-10">
                <input type="date" name="tanggal" class="form-control" value="<?php echo $row['tanggal']; ?>">
            </div>
        </div>
        <div class="mb-3">
            <div class="col-sm-10">
                <button type="submit" value="Update" class="btn btn-primary">Update</button>
                <a href="?page=tabel" class="btn btn-light">Batalkan</a>
            </div>
        </div>
    </div>
</form>