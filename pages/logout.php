<?php
if (defined("GELANG") === false) {
    die("Anda tidak berhak membuka file ini secara langsung");
}

session_destroy();

redirect('?page=login&msg=1');
