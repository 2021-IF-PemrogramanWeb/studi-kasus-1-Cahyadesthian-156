<?php
session_start();

if(!isset($_SESSION['login'])) {
    header("Location: 1_halaman1-login.php");
    exit;
}
require 'functions.php';

//jika URL tidak mengandung Userid
if( !isset($_GET['USR_ID']) ) {
    header("Location: 1_halaman1-login.php");
    exit;
}

//ambil id dari URL
$idUser = $_GET['USR_ID'];

if(isset($_POST['tambah'])) {
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    if( tambah($_POST)  > 0 ) {
        //echo "data berhasil ditambahkan";
        echo "<script>
               alert('data berhasil ditambahkan');
               document.location.href = '2_halaman-tabel.php?USR_ID=$idUser';
            </script>";
    } else {
        echo "data gagal ditambahkan!";
    }
}


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Tambah Data</title>
  </head>
  <body>
    
  <div class="container">

  <form action="" method="POST">
        <div class="form-group">
            <label>ON</label>
            <input type="datetime-local" class="form-control" name="KJD_ON" required>
        </div>
        <div class="form-group">
            <label>OF</label>
            <input type="datetime-local" class="form-control" name="KJD_OF" required>
        </div>
        <div class="form-group">
            <label>Act by</label>
            <input type="text" class="form-control" name="KJD_ACT" required>
        </div>
        <div class="form-group">
            <label>Dis by</label>
            <input type="text" class="form-control" name="KJD_DIS" required>
        </div>
        <div class="form-group">
            <label>ID Kejadian</label>
            <input type="number" class="form-control" name="R_ID_KJD" required>
        </div>
        <div class="form-group">
            <label>User ID</label>
            <input type="number" class="form-control" name="USR_ID_KJD" required>
        </div>
        <button type="submit" class="btn btn-primary" name="tambah">Submit</button>
    </form>

  </div>
  

    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>