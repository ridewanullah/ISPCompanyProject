<?php
    if ($_GET['module']=='home') {
        include "dashboard.php";
    }elseif($_GET['module']=='sales') {
        include "module\sales\sales.php";
    }elseif($_GET['module']=='paket') {
        include "module\paket\paket.php";
    }elseif($_GET['module']=='penjualan') {
        include "module\jual\jual.php";
    }else{
        echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
    }
?>