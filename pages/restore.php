<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}

if (isset($_GET['stat'])) {
    $stat = $_GET['stat'];
    if ($stat == 1) {
        $id_data = $_GET['id_data'];


        $data = [
            'delete_stat' => 0
        ];

        update_data($connection, "data", $data, $id_data, "id_data");

        redirect('?page=bin');
    } elseif ($stat == 2) {
        echo "Harus Login";
    }
}
