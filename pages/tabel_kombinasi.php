<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}
?>

<h1 class="judul">Tabel Kombinasi</h1>
<form method="POST">
    <table>
        <tr>
            <td style="color: white;">From</td>
            <td><input type="date" name="dari_tgl" required="required"></td>
            <td> </td>
            <td style="color: white;">To</td>
            <td><input type="date" name="sampai_tgl" required="required"></td>
            <td><input type="submit" class="btn btn-sm btn-primary" name="filter" value="Filter"></td>
        </tr>
    </table>
</form>
<br>
<div class="row">
    <div class="col-6">
        <table class="table table-bordered">
            <tr>
                <th style="text-align: center;">No</th>
                <th>Waktu Makan</th>
                <th>Nama Makanan</th>
                <th>Kalori</th>
                <th>Jam Makan</th>
                <th>Tanggal</th>
            </tr>

            <?php
            $id_user = $_SESSION['id_user'];
            $no = 1;
            $total_kal = 0;
            //pagination
            $limit = 2;

            if (isset($_POST['filter'])) {
                $dari_tgl = mysqli_real_escape_string($connection, filter_data($_POST['dari_tgl']));
                $sampai_tgl = mysqli_real_escape_string($connection, filter_data($_POST['sampai_tgl']));

                //pagination
                $result = mysqli_query($connection, "SELECT * FROM data WHERE delete_stat='0' AND id_user=$id_user AND tanggal BETWEEN '$dari_tgl' AND '$sampai_tgl'");
                $jumlah_data = mysqli_num_rows($result);
                $hal_kal = ceil($jumlah_data / $limit);
                $hal_aktif = (isset($_GET["hal"])) ? $_GET["hal"] : 1;
                $mulai = ($limit * $hal_aktif) - $limit;
                // var_dump($jumlah_data);
                $sql = "SELECT * FROM data WHERE delete_stat='0' AND id_user=$id_user AND tanggal BETWEEN '$dari_tgl' AND '$sampai_tgl' LIMIT $mulai, $limit";
            } else {
                //pagination
                $result = mysqli_query($connection, "SELECT * FROM data WHERE delete_stat='0' AND id_user=$id_user");
                $jumlah_data = mysqli_num_rows($result);
                $hal_kal = ceil($jumlah_data / $limit);
                $hal_aktif = (isset($_GET["hal"])) ? $_GET["hal"] : 1;
                $mulai = ($limit * $hal_aktif) - $limit;
                // var_dump($hal_aktif);
                // var_dump($hal);
                // var_dump($jumlah_data);
                $sql = "SELECT * FROM data WHERE delete_stat='0' AND id_user=$id_user LIMIT $mulai, $limit";
            }

            $hasil = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($hasil)) {
                echo "<tr>";
                echo "<td style='text-align: center;'>" . $no . ". </td>";
                echo "<td>" . $row['jenis_makanan'] . "</td>";
                echo "<td>" . $row['nama_makanan'] . "</td>";
                echo "<td>" . $row['kalori_makanan'] . "</td>";
                echo "<td>" . $row['waktu'] . "</td>";
                // echo "<td>" . $row['tanggal'] . "</td>";
                echo "<td>" . date('d-m-Y', strtotime($row['tanggal'])) . "</td>";
                $total_kal += $row['kalori_makanan'];
                $no++;
            ?>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="4" style="text-align: center;">Total Kalori :</td>
                <td colspan="3" style="text-align: center;"><?php echo $total_kal ?> Kalori</td>
            </tr>

        </table>

    </div>
    <div class="col-6">
        <table class="table table-bordered">
            <tr>
                <th style="text-align: center;">No</th>
                <th>Waktu Olahraga</th>
                <th>Nama Olahraga</th>
                <th>Kalori Terbakar</th>
                <th>Jam Olahraga</th>
                <th>Tanggal</th>
            </tr>

            <?php
            $id_user = $_SESSION['id_user'];
            $no = 1;
            $total_ol = 0;
            //pagination
            $limit = 2;

            if (isset($_POST['filter'])) {
                $dari_tgl = mysqli_real_escape_string($connection, filter_data($_POST['dari_tgl']));
                $sampai_tgl = mysqli_real_escape_string($connection, filter_data($_POST['sampai_tgl']));

                //pagination
                $result = mysqli_query($connection, "SELECT * FROM olahraga WHERE delete_stat='0' AND id_user=$id_user AND tanggal BETWEEN '$dari_tgl' AND '$sampai_tgl'");
                $jumlah_data = mysqli_num_rows($result);
                $hal_ol = ceil($jumlah_data / $limit);
                $hal_aktif = (isset($_GET["hal"])) ? $_GET["hal"] : 1;
                $mulai = ($limit * $hal_aktif) - $limit;
                // var_dump($jumlah_data);
                $sql = "SELECT * FROM olahraga WHERE delete_stat='0' AND id_user=$id_user AND tanggal BETWEEN '$dari_tgl' AND '$sampai_tgl' LIMIT $mulai, $limit";
            } else {
                //pagination
                $result = mysqli_query($connection, "SELECT * FROM olahraga WHERE delete_stat='0' AND id_user=$id_user");
                $jumlah_data = mysqli_num_rows($result);
                $hal_ol = ceil($jumlah_data / $limit);
                $hal_aktif = (isset($_GET["hal"])) ? $_GET["hal"] : 1;
                $mulai = ($limit * $hal_aktif) - $limit;
                // var_dump($hal_aktif);
                // var_dump($hal);
                // var_dump($jumlah_data);
                $sql = "SELECT * FROM olahraga WHERE delete_stat='0' AND id_user=$id_user LIMIT $mulai, $limit";
            }

            $hasil = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($hasil)) {
                echo "<tr>";
                echo "<td style='text-align: center;'>" . $no . ". </td>";
                echo "<td>" . $row['waktu_olahraga'] . "</td>";
                echo "<td>" . $row['nama_olahraga'] . "</td>";
                echo "<td>" . $row['kalori_olahraga'] . "</td>";
                echo "<td>" . $row['waktu'] . "</td>";
                // echo "<td>" . $row['tanggal'] . "</td>";
                echo "<td>" . date('d-m-Y', strtotime($row['tanggal'])) . "</td>";
                $total_ol += $row['kalori_olahraga'];
                $no++;
            ?>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="4" style="text-align: center;">Total Kalori Terbakar :</td>
                <td colspan="3" style="text-align: center;"><?php echo $total_ol ?> Kalori</td>
            </tr>

        </table>

    </div>
</div>
<div class="container-fluid">
    <!-- Navigasi -->
    <?php if ($hal_kal > $hal_ol) : ?>
        <?php if ($hal_aktif > 1) : ?>
            <a href="?page=tabel_kombinasi&hal=<?php echo $hal_aktif - 1 ?>" class=" btn btn-sm btn-primary">Previous</a>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $hal_kal; $i++) : ?>
            <?php if ($i == $hal_aktif) : ?>
                <a style="font-weight: bold; color:#913f9e" href="?page=tabel_kombinasi&hal=<?php echo $i ?>"><?php echo $i ?></a>
            <?php else : ?>
                <a href="?page=tabel_kombinasi&hal=<?php echo $i ?>"><?php echo $i ?></a>
            <?php endif; ?>
        <?php endfor ?>
        <?php if ($hal_aktif < $hal_kal) : ?>
            <a href="?page=tabel_kombinasi&hal=<?php echo $hal_aktif + 1 ?>" class=" btn btn-sm btn-primary">Next</a>
        <?php endif; ?>
    <?php else : ?>
        <?php if ($hal_aktif > 1) : ?>
            <a href="?page=tabel_kombinasi&hal=<?php echo $hal_aktif - 1 ?>" class=" btn btn-sm btn-primary">Previous</a>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $hal_ol; $i++) : ?>
            <?php if ($i == $hal_aktif) : ?>
                <a style="font-weight: bold; color:#913f9e" href="?page=tabel_kombinasi&hal=<?php echo $i ?>"><?php echo $i ?></a>
            <?php else : ?>
                <a href="?page=tabel_kombinasi&hal=<?php echo $i ?>"><?php echo $i ?></a>
            <?php endif; ?>
        <?php endfor ?>
        <?php if ($hal_aktif < $hal_ol) : ?>
            <a href="?page=tabel_kombinasi&hal=<?php echo $hal_aktif + 1 ?>" class=" btn btn-sm btn-primary">Next</a>
        <?php endif; ?>
    <?php endif; ?>
    <br>
    <h3 style="text-align: center; color:white;">Total Kalori Keseluruhan Adalah : <b><?php echo $total_kal - $total_ol ?></b> Kalori</h3>
</div>