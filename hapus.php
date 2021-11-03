<?php

require_once 'functions.php';

//jika URL tidak mengandung ID
if(!isset($_GET['KJD_ID'])) {
    header("Location: 2_halaman-tabel.php");
    exit;
}

// ambil id kejadian / KJD_ID dari URL
$kjdIdDelete = $_GET['KJD_ID'];


if( hapus($kjdIdDelete) > 0 ) {
    echo "<script>
                alert('data berhasil dihapus');
                document.location.href = '2_halaman-tabel.php';
          </script>";
} else {
    echo "data gagal dihapus!";
}