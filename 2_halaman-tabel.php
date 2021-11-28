<?php 
session_start();

if(!isset($_SESSION['login'])) {
    header("Location: 1_halaman1-login.php");
    exit;
}

require_once 'functions.php';

$idLogged = $_SESSION["user_id"];


$dataKejadian = query("SELECT KJD_ID, KJD_ON, KJD_OF, KJD_ACT, KJD_DIS, R_ID_KJD, USR_ID_KJD, R_DESC 
                        FROM kejadian INNER JOIN reason ON kejadian.R_ID_KJD = reason.R_ID 
                        WHERE USR_ID_KJD=$idLogged
                        ORDER BY KJD_ID");

$yangLogin = query("SELECT * FROM user WHERE USR_ID = $idLogged");


if(isset($_POST['delete-data'])) {
  if( hapus($_POST) > 0 ) {
    // echo "Data berhasil ditambahkan";
    echo "
        <script>
            alert('data berhasil dihapus');
            document.location.href = '2_halaman-tabel.php';
        </script>
    ";
  } else {
      // echo "gagal ditambahkan";
      echo "
          <script>
              alert('data gagal dihapus');
              document.location.href = '2_halaman-tabel.php';
          </script>
      ";
  }

}

if( isset($_POST["cari"]) ) {
  
  $dataKejadian = cari($_POST["keyword"], $idLogged); 

} 


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman 2 - Tabel</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

  </head>

  <body>
    <!-- Navbar -->
    <nav class="shadow navbar fixed-top navbar-light bg-light">
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

    <div class="container" style="padding-top: 40px;">
        <form action="" method="POST">
            <div class="input-group mt-5">
                <input type="text" class="form-control" placeholder="Act by or Dis By" autocomplete="off" name="keyword" autofocus>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" name="cari"><i class="bi bi-search"></i> Cari</button>
                </div>
            </div>
        </form> 
    </div>
    

    <!-- Button and Table -->
    <section id="button-table" class="p-5">

      <div class="container">

        <div class="row g-4">

          <div class="col">

            <div class="row py-1">
              <a href="tambah.php" type="button" class="btn btn-success"><i class="bi bi-plus-circle-fill"></i> Add</a>
            </div>

            <div class="row py-1">
              <a href="3_halaman-grafik.php" type="button" class="btn btn-warning"><i class="bi bi-file-bar-graph-fill"></i> Graph</a>
            </div>

            <div class="row py-1">
              <a href="export.php" target="_blank" type="button" class="btn btn-info"><i class="bi bi-printer"> </i>Export</a>
            </div>

            <div class="row py-1">
              <a href="logout.php" type="button" class="btn btn-danger"><i class="bi bi-box-arrow-left"></i> Logout</a>
            </div>

            <!-- mobil1 -->
            <div class="row pt-5">
              <div class="card bg-primary">
                <div class="card-body">
                  <p class="card-text fw-bold">Mobil 1</p>
                </div>
              </div>
            </div>

            <!-- Mobil2 -->
            <div class="row pt-1">
              <div class="card bg-success">
                <div class="card-body">
                  <p class="card-text fw-bold">Mobil 2</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-md-10">
            
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">On</th>
                        <th scope="col">Off</th>
                        <th scope="col">Ack by</th>
                        <th scope="col">Reason</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>

                <?php if(empty($dataKejadian)) : ?>
                  <tr>
                      <td colspan="6"><p>Data Not Found</p></td>
                  </tr>
                <?php endif; ?>

                <tbody>
                  <?php $i = 1;
                  foreach($dataKejadian as $datKej) :  ?>

                  <tr>
                    <th scope="row"> <?=  $i++; ?> </th>
                    <td> <?= $datKej['KJD_ON']; ?> </td>
                    <td> <?= $datKej['KJD_OF']; ?> </td>
                    <td>Act: <?= $datKej['KJD_ACT']; ?> 
                      <br>Dis: <?= $datKej['KJD_DIS']; ?> 
                    <td> <?= $datKej['R_DESC']; ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                        <form action="ubah.php" method="POST">
                          <input type="hidden" name="KJD_ID" value="<?= $datKej['KJD_ID'] ?>">
                          <button name="update-data" class="btn btn-primary mx-1"><i class="bi bi-pencil-square"></i></button>
                        </form>
                        <form action="" method="POST">
                          <input type="hidden" name="KJD_ID_DELETE" value="<?= $datKej['KJD_ID'] ?>">
                          <button name="delete-data" class="btn btn-danger mx-1" onclick="return confirm('Hapus Data?');"><i class="bi bi-trash-fill"></i></button>
                        </form>
                      </div> 
                    </td>
                  </tr>
                  
                  <?php endforeach; ?>
                
                </tbody>
            
              </table>
          </div>
        
        </div>
      
      </div>

    </section>
    <!-- Closing BUtton and Table -->

    <!-- Bootstrap bundle -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
