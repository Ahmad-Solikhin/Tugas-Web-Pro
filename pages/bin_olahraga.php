<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}

$sql = "SELECT * FROM olahraga WHERE delete_stat='1'";

$hasil = mysqli_query($connection, $sql);
$coba = mysqli_fetch_assoc($hasil);

if ($coba != null) {


?>
    <h1 class="judul">Tabel Bin Olahraga</h1>
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

            $hasil2 = mysqli_query($connection, $sql);
            $no = 1;
            $total = 0;
            while ($row = mysqli_fetch_assoc($hasil2)) {
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
                    <a href="?page=restore&id_olahraga=<?php echo $row['id_olahraga'] ?>&stat=2" class="btn btn-info btn-sm">Restore</a>
                </td>
                </tr>
        <?php
            }
        } else {
            echo "<h1 class='judul'>Tidak Ada Bin Olahraga</h1>";
        } ?>

        </table>
    </div>