<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}
?>
<div class="row">
    <div class="col-6">
        <h1 class="judul">Tabel Kalori</h1>
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

            $sql = "SELECT * FROM data WHERE delete_stat='0'";

            $hasil = mysqli_query($connection, $sql);
            $no = 1;
            $total_kal = 0;
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
        <h1 class="judul">Tabel Olahraga</h1>
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

            $sql = "SELECT * FROM olahraga WHERE delete_stat='0'";

            $hasil = mysqli_query($connection, $sql);
            $no = 1;
            $total_ol = 0;
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
<div class="row">
    <div class="col col-12">
        <h3 style="text-align: center;">Total Kalori Keseluruhan Adalah : <?php echo $total_kal - $total_ol ?> Kalori</h3>
    </div>
</div>