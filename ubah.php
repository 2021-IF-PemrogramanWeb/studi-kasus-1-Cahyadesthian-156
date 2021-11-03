<?php
require_once 'functions.php';

//jika URL tidak mengandung ID
if(!isset($_GET['KJD_ID'])) {
    header("Location: 2_halaman-tabel.php");
    exit;
}


//ambil id dari URL
$idKej = $_GET['KJD_ID'];

//query
$datKej = query("SELECT * FROM kejadian WHERE KJD_ID = $idKej");
    echo '<pre>';
    var_dump($datKej);
    echo '</pre>';


if(isset($_POST['ubah'])) {
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    if( ubah($_POST)  > 0 ) {
        //echo "data berhasil ditambahkan";
        echo "<script>
                alert('data berhasil diubah');
                document.location.href = '2_halaman-tabel.php';
            </script>";
    } else {
        echo "data gagal diubah!";
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

    <title>Ubah Data</title>
  </head>
  <body>
    
  <h3>Form Ubah Data</h3>
  <div class="container">

  <form action="" method="POST">

        <input type="hidden" name="KJD_ID" value="<?= $datKej['KJD_ID'] ?>">

        <div class="form-group">
            <label>ON</label>
            <input type="text" class="form-control" name="KJD_ON" readonly value="<?= $datKej['KJD_ON']?>" >
            
        </div>
        <div class="form-group">
            <label>OFF</label>
            <input type="text" class="form-control" name="KJD_OF" readonly value="<?= $datKej['KJD_OF']?>">
        </div>
        <div class="form-group">
            <label>Act by</label>
            <input value="<?= $datKej['KJD_ACT']?>" type="text" class="form-control" name="KJD_ACT" required>
        </div>
        <div class="form-group">
            <label>Dis by</label>
            <input value="<?= $datKej['KJD_DIS']?>" type="text" class="form-control" name="KJD_DIS" required>
        </div>
        <div class="form-group">
            <label>ID Kejadian</label>
            <input value="<?= $datKej['R_ID_KJD']?>" type="number" class="form-control" name="R_ID_KJD" required>
        </div>
        <div class="form-group">
            <label>User ID</label>
            <input value="<?= $datKej['USR_ID_KJD']?>" type="number" class="form-control" name="USR_ID_KJD" required>
        </div>
        <button type="submit" class="btn btn-primary" name="ubah">Update</button>
    </form>

  </div>
  

    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>