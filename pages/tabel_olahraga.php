<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}
?>
<h1 class="judul">Tabel Olahraga</h1>
<div class="container-fluid">
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
    <table class="table table-bordered">
        <tr>
            <th style="text-align: center;">No</th>
            <th>Waktu Olahraga</th>
            <th>Nama Olahraga</th>
            <th>Kalori Terbakar</th>
            <th>Jam Olahraga</th>
            <th>Tanggal</th>
            <th class="text-center">Aksi</th>
        </tr>

        <?php
        $id_user = $_SESSION['id_user'];
        $no = 1;
        $total = 0;
        //pagination
        $limit = 2;

        if (isset($_POST['filter'])) {
            $dari_tgl = mysqli_real_escape_string($connection, filter_data($_POST['dari_tgl']));
            $sampai_tgl = mysqli_real_escape_string($connection, filter_data($_POST['sampai_tgl']));
            //pagination
            $result = mysqli_query($connection, "SELECT * FROM olahraga WHERE delete_stat='0' AND id_user=$id_user AND tanggal BETWEEN '$dari_tgl' AND '$sampai_tgl'");
            $jumlah_data = mysqli_num_rows($result);
            $hal = ceil($jumlah_data / $limit);
            $hal_aktif = (isset($_GET["hal"])) ? $_GET["hal"] : 1;
            $mulai = ($limit * $hal_aktif) - $limit;
            // var_dump($jumlah_data);
            $sql = "SELECT * FROM olahraga WHERE delete_stat='0' AND id_user=$id_user AND tanggal BETWEEN '$dari_tgl' AND '$sampai_tgl' LIMIT $mulai, $limit";
        } else {
            //pagination
            $result = mysqli_query($connection, "SELECT * FROM olahraga WHERE delete_stat='0' AND id_user=$id_user");
            $jumlah_data = mysqli_num_rows($result);
            $hal = ceil($jumlah_data / $limit);
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
            $total += $row['kalori_olahraga'];
            $no++;
        ?>
            <td style="text-align: center;">
                <a href="?page=edit&id_olahraga=<?php echo $row['id_olahraga'] ?>&stat=2" class="btn btn-info btn-sm">Edit</a>
                <a href="?page=delete&id_olahraga=<?php echo $row['id_olahraga'] ?>&stat=2" class="btn btn-danger btn-sm">Hapus</a>
            </td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="4" style="text-align: center;">Total Kalori Terbakar :</td>
            <td colspan="3" style="text-align: center;"><?php echo $total ?> Kalori</td>
        </tr>

    </table>

    <!-- Navigasi -->
    <?php if ($hal_aktif > 1) : ?>
        <a href="?page=tabel_olahraga&hal=<?php echo $hal_aktif - 1 ?>" class=" btn btn-sm btn-primary">Previous</a>
    <?php endif; ?>
    <?php for ($i = 1; $i <= $hal; $i++) : ?>
        <?php if ($i == $hal_aktif) : ?>
            <a style="font-weight: bold; color:#913f9e" href="?page=tabel_olahraga&hal=<?php echo $i ?>"><?php echo $i ?></a>
        <?php else : ?>
            <a href="?page=tabel_olahraga&hal=<?php echo $i ?>"><?php echo $i ?></a>
        <?php endif; ?>
    <?php endfor ?>
    <?php if ($hal_aktif < $hal) : ?>
        <a href="?page=tabel_olahraga&hal=<?php echo $hal_aktif + 1 ?>" class=" btn btn-sm btn-primary">Next</a>
    <?php endif; ?>

</div>