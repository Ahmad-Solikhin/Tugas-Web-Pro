<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}
?>

<?php

if (isset($_GET['stat'])) {
    $stat = $_GET['stat'];
    if ($stat == 1) {
        echo '<h1 class="judul">Edit Data</h1>';
        $id_data = $_GET['id_data'];
        $sql = "select * from data where id_data=$id_data";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);

?>
        <form action="?page=update&id_data=<?php echo $row['id_data'] ?>&stat=1" method="POST">
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
    <?php
    } elseif ($stat == 2) {
        echo '<h1 class="judul">Edit Data</h1>';
        $id_olahraga = $_GET['id_olahraga'];
        $sql = "select * from olahraga where id_olahraga=$id_olahraga";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);

    ?>
        <form action="?page=update&id_olahraga=<?php echo $row['id_olahraga'] ?>&stat=2" method="POST">
            <div class="content">
                <div class="mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Waktu</label>
                    <div class="col-sm-10">
                        <select name="waktu_olahraga" class="form-select" aria-label="Default select example">
                            <option selected><?php echo $row['waktu_olahraga']; ?></option>
                            <option value="Sarapan">Sarapan</option>
                            <option value="Makan Siang">Makan Siang</option>
                            <option value="Makan Malam">Makan Malam</option>
                            <option value="Camilan">Cemilan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Olahraga</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_olahraga" class="form-control" value="<?php echo $row['nama_olahraga']; ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kalori Terbakar</label>
                    <div class="col-sm-10">
                        <input type="text" name="kalori_olahraga" class="form-control" value="<?php echo $row['kalori_olahraga']; ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Jam Olahraga</label>
                    <div class="col-sm-10">
                        <input type="time" name="waktu" class="form-control" value="<?php echo $row['waktu']; ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Olahraga</label>
                    <div class="col-sm-10">
                        <input type="date" name="tanggal" class="form-control" value="<?php echo $row['tanggal']; ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col-sm-10">
                        <button type="submit" value="Update" class="btn btn-primary">Update</button>
                        <a href="?page=tabel_olahraga" class="btn btn-light">Batalkan</a>
                    </div>
                </div>
            </div>
        </form>
<?php
    } elseif ($stat == 3) {
        echo '<h1 class="judul">Edit Data</h1>';
        echo "Edit Profile";
    } else {
        redirect('?page=404');;
    }
}
?>