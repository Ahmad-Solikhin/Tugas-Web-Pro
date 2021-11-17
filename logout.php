<?php
    if(defined("GELANG" === false)){
        die ("Anda tidak bisa mengakses halaman ini secara langsung!");
    }

    session_destroy();

    redirect('?p=login&msg=1');