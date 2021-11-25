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
        $id_user = $_SESSION['id_user'];
        $sql = "select * from data where id_data=$id_data and id_user=$id_user";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);
?>
        <form action="?page=update&id_data=<?php echo $row['id_data'] ?>&stat=1" method="POST">
            <div class="content">
                <div class="mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Waktu</label>
                    <div class="col">
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
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Makanan</label>
                    <div class="col">
                        <input type="text" name="nama_makanan" class="form-control" value="<?php echo $row['nama_makanan']; ?>" autocomplete="off">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Kalori</label>
                    <div class="col">
                        <input type="text" name="kalori_makanan" class="form-control" value="<?php echo $row['kalori_makanan']; ?>" autocomplete="off">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Jam Makan</label>
                    <div class="col">
                        <input type="time" name="waktu" class="form-control" value="<?php echo $row['waktu']; ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Makan</label>
                    <div class="col">
                        <input type="date" name="tanggal" class="form-control" value="<?php echo $row['tanggal']; ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col">
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
        $id_user = $_SESSION['id_user'];
        $sql = "select * from olahraga where id_olahraga=$id_olahraga and id_user=$id_user";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);

    ?>
        <form action="?page=update&id_olahraga=<?php echo $row['id_olahraga'] ?>&stat=2" method="POST">
            <div class="content">
                <div class="mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Waktu</label>
                    <div class="col">
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
                    <div class="col">
                        <input type="text" name="nama_olahraga" class="form-control" value="<?php echo $row['nama_olahraga']; ?>" autocomplete="off">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kalori Terbakar</label>
                    <div class="col">
                        <input type="text" name="kalori_olahraga" class="form-control" value="<?php echo $row['kalori_olahraga']; ?>" autocomplete="off">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Jam Olahraga</label>
                    <div class="col">
                        <input type="time" name="waktu" class="form-control" value="<?php echo $row['waktu']; ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal Olahraga</label>
                    <div class="col">
                        <input type="date" name="tanggal" class="form-control" value="<?php echo $row['tanggal']; ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="col">
                        <button type="submit" value="Update" class="btn btn-primary">Update</button>
                        <a href="?page=tabel_olahraga" class="btn btn-light">Batalkan</a>
                    </div>
                </div>
            </div>
        </form>
    <?php
    } elseif ($stat == 3) {

        $id_user = $_GET['id_user'];
        $sql = "select * from user where id_user='$id_user'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);
    ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col col-11">
                    <h1 class="judul">Edit Profil</h1>
                </div>
                <div class="col col-1"></div>
            </div>
            <br>
            <div class="row">
                <div class="col col-4"></div>
                <div class="col col-4">
                    <form action="?page=update&id_user=<?php echo $row['id_user'] ?>&stat=3" method="POST">
                        <div class="content">
                            <div class="mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label profil-title">Nama</label>
                                <div class="col">
                                    <input type="text" name="nm_user" class="form-control" value="<?php echo $row['nm_user']; ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label profil-title">Username</label>
                                <div class="col">
                                    <input type="text" name="user_username" class="form-control" value="<?php echo $row['user_username']; ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label profil-title">Usia</label>
                                <div class="col">
                                    <input type="text" name="usia" class="form-control" value="<?php echo $row['usia']; ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label profil-title">Tinggi</label>
                                <div class="col">
                                    <input type="text" name="tinggi_badan" class="form-control" value="<?php echo $row['tinggi_badan']; ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label profil-title">Berat</label>
                                <div class="col">
                                    <input type="text" name="berat_badan" class="form-control" value="<?php echo $row['berat_badan']; ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col">
                                    <button type="submit" value="Update" class="btn btn-info btn-sm">Update</button>
                                    <a href="?page=akun" class="btn btn-light btn-sm">Batalkan</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<?php
    } else {
        redirect('?page=404');;
    }
}
?>