<?php
function cek_akses($koneksi, $id_role, $action)
{
    $sql = "SELECT * FROM modul_role WHERE id_role=$id_role AND is_$action=1 AND deleted_at IS NULL";
    $result = mysqli_query($koneksi, $sql);

    $num = mysqli_num_rows($result);
    if ($num > 0) {
        //ada
        return true;
    }
    return false;
}

function indeks_count($berat, $tinggi)
{
    $tinggi = $tinggi / 100;
    $indeks = $berat / ($tinggi * $tinggi);
    return $indeks;
}

function cek_imt($nilai)
{
    $imt = null;
    if ($nilai < 18.5) {
        $imt = "UNDERWEIGHT";
    } elseif ($nilai >= 18.5 && $nilai <= 25) {
        $imt = "NORMAL";
    } elseif ($nilai >= 25.1 && $nilai <= 27) {
        $imt = "OVERWEIGHT";
    } elseif ($nilai > 27) {
        $imt = "OBESITAS";
    }

    return $imt;
}

function insert_data($koneksi, $nama_tabel, $data)
{
    $col = [];
    $val = [];
    foreach ($data as $k => $v) {
        $col[] = $k;
        $val[] = "'" . $v . "'";
    }

    $sql = "INSERT INTO " . $nama_tabel . " (" . implode(',', $col) . ") VALUES (" . implode(',', $val) . ")";
    mysqli_query($koneksi, $sql);
}

function update_data($koneksi, $nama_tabel, $data, $id, $pri)
{
    $sql = "UPDATE $nama_tabel SET ";

    $update = [];
    foreach ($data as $col => $val) {
        $update[] = $col . "='$val'";
    }
    $sql .= implode(",", $update);
    $sql .= " WHERE $pri=$id";

    mysqli_query($koneksi, $sql);
}

function filter_data($text)
{
    $text = addslashes($text);
    $text = htmlspecialchars($text);

    return $text;
}

function redirect($page)
{
    echo "<script>
        window.location.replace('$page')
    </script>";
}
