<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}
$id_user = $_SESSION['id_user'];
$sql = "SELECT * FROM data WHERE delete_stat='1' AND id_user=$id_user";

$hasil = mysqli_query($connection, $sql);
$coba = mysqli_fetch_assoc($hasil);

if ($coba != null) {

    $is_allow = cek_akses($connection, $_SESSION['id_role'], 'restore');


?>
    <h1 class="judul">Tabel Bin Kalori</h1>
    <div class="container-fluid">
        <table class="table table-bordered">
            <tr>
                <th style="text-align: center;">No</th>
                <th>Waktu Makan</th>
                <th>Nama Makanan</th>
                <th>Kalori</th>
                <th>Jam Makan</th>
                <th>Tanggal</th>
                <?php if ($is_allow) : ?>
                    <th class="text-center">Aksi</th>
                <?php endif; ?>
            </tr>

            <?php

            $hasil2 = mysqli_query($connection, $sql);
            $no = 1;
            $total = 0;
            while ($row = mysqli_fetch_assoc($hasil2)) {
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
                <?php if ($is_allow) : ?>
                    <td style="text-align: center;">
                        <a href="?page=restore&id_data=<?php echo $row['id_data'] ?>&stat=1" class="btn btn-info btn-sm">Restore</a>
                    </td>
                <?php endif; ?>
                </tr>
        <?php
            }
        } else {
            echo "<h1 class='judul'>Tidak Ada Bin Kalori</h1>";
        } ?>

        </table>
    </div>