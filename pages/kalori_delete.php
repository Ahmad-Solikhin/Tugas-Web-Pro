<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}

$id_data = $_GET['id_data'];


$data = [
    'delete_stat' => 1
];

update_data($connection, "data", $data, $id_data, "id_data");

redirect('?page=tabel');
