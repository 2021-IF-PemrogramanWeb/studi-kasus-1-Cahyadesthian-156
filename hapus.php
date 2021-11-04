<?php

session_start();

if(!isset($_SESSION['login'])) {
    header("Location: 1_halaman1-login.php");
    exit;
}

require_once 'functions.php';

// ambil id kejadian / KJD_ID dari URL
$kjdIdDelete = $_GET['KJD_ID'];
$idLogin = $_GET['USR_ID'];

//jika URL tidak mengandung ID
if(!isset($_GET['KJD_ID']) OR !isset($_GET['USR_ID'])) {
    header("Location: 2_halaman-tabel.php?USR_ID='$idLogin'");
    exit;
}





if( hapus($kjdIdDelete) > 0 ) {
    echo "<script>
                alert('data berhasil dihapus');
                document.location.href = '2_halaman-tabel.php?USR_ID=$idLogin';
          </script>";
} else {
    echo "data gagal dihapus!";
}