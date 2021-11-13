<?php
session_start();

if(!isset($_SESSION['login'])) {
    header("Location: 1_halaman1-login.php");
    exit;
}

require_once 'functions.php';


$idLogged = $_SESSION["user_id"];
$yangLogin = query("SELECT * FROM user WHERE USR_ID = $idLogged");


if(isset($_POST['submit'])) {
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    if( tambah($_POST)  > 0 ) {
        //echo "data berhasil ditambahkan";
        echo "<script>
               alert('data berhasil ditambahkan');
               document.location.href = '2_halaman-tabel.php';
            </script>";
    } else {
        echo "
          <script>
            alert('data gagal ditambahkan');
            document.location.href = '2_tableview_2_update.php';
          </script>";
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

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

    <title>Tambah Data</title>
  </head>
  <body>

  <!-- Navbar -->
  <nav class="navbar navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="wolf-icon.png" alt="" width="30" class="d-inline-block align-text-top" />
        </a> 
        <?php echo date("l"). ", " . date("Y/m/d") . " | " . $yangLogin['USR_NAME'] ; ?>
        

        <div class="">
          <div class="navbar-nav ms-auto container-fluid">
            <a href="">
              <img src="photo/<?= $yangLogin['USR_PHOTO']; ?>" height="30" class="rounded-circle d-inline-block align-text-top" />
            </a>
          </div>
        </div>
      </div>
    </nav>
    <!-- Closing Navbar -->
    
  <div class="container">


  <h3 class="text-center pt-5">Form Tambah Data</h3>

  <form action="" method="POST">
        <div class="form-group">
            <label>ON</label>
            <input type="datetime-local" class="form-control" name="KJD_ON" required>
        </div>
        <div class="form-group">
            <label>OFF</label>
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
          <input type="hidden" class="form-control" name="USR_ID_KJD" required value="<?= $yangLogin['USR_ID']; ?>" readonly>
        </div>

        <button type="submit" class="btn btn-primary mt-2" name="submit"><i class="bi bi-cloud-arrow-up-fill"></i> Submit</button>
        <a href="2_halaman-tabel.php" type="button" class="btn btn-warning mt-2"><i class="bi bi-table"></i> Kembali</a>
    </form>

  </div>
  

    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>