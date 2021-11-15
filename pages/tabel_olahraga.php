<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}
?>
<h1 class="judul">Tabel Olahraga</h1>
<div class="container-fluid">
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

        $sql = "SELECT * FROM olahraga WHERE delete_stat='0'";

        $hasil = mysqli_query($connection, $sql);
        $no = 1;
        $total = 0;
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

</div>