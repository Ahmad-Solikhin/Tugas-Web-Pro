<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}
?>
<h1 class="judul">Tabel Bin</h1>
<div class="container-fluid">
    <table class="table table-bordered">
        <tr>
            <th style="text-align: center;">No</th>
            <th>Waktu Makan</th>
            <th>Nama Makanan</th>
            <th>Kalori</th>
            <th>Jam Makan</th>
            <th>Tanggal</th>
            <th class="text-center">Aksi</th>
        </tr>

        <?php

        $sql = "SELECT * FROM data WHERE delete_stat='1'";

        $hasil = mysqli_query($connection, $sql);
        $no = 1;
        $total = 0;
        while ($row = mysqli_fetch_assoc($hasil)) {
            echo "<tr>";
            echo "<td style='text-align: center;'>" . $no . ". </td>";
            echo "<td>" . $row['jenis_makanan'] . "</td>";
            echo "<td>" . $row['nama_makanan'] . "</td>";
            echo "<td>" . $row['kalori_makanan'] . "</td>";
            echo "<td>" . $row['waktu'] . "</td>";
            // echo "<td>" . $row['tanggal'] . "</td>";
            echo "<td>" . date('d-m-Y', strtotime($row['tanggal'])) . "</td>";
            $total += $row['kalori_makanan'];
            $no++;
        ?>
            <td style="text-align: center;">
                <a href="?page=kalori_restore&id_data=<?php echo $row['id_data'] ?>" class="btn btn-info btn-sm">Restore</a>
            </td>
            </tr>
        <?php } ?>

    </table>
</div>