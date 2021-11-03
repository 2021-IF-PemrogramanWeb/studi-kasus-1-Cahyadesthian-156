<?php 

require_once 'functions.php';

// echo "<pre>";
// echo var_dump($rows);
// echo "</pre>";


//ubah dalam bentuk array
$dataKejadian = query("SELECT * FROM kejadian WHERE USR_ID_KJD=1");


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
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="wolf-icon.png" alt="" width="30" class="d-inline-block align-text-top" />
        </a>
        29 Oktober 2021

        <div class="">
          <div class="navbar-nav ms-auto container-fluid">
            <a href="">
              <img src="photo/agniasari.jpg" width="30" class="rounded-circle d-inline-block align-text-top" />
            </a>
          </div>
        </div>
      </div>
    </nav>
    <!-- Closing Navbar -->

    <!-- Button and Table -->
    <section id="button-table" class="p-5">
      <div class="container">
        <div class="row g-4">
          <div class="col">
            <div class="row py-1">
              <a href="tambah.php" type="button" class="btn btn-success">Add</a>
            </div>
            <div class="row py-1">
              <button type="button" class="btn btn-warning">Graph</button>
            </div>
            <div class="row py-1">
              <button type="button" class="btn btn-info">Export</button>
            </div>
            <div class="row py-1">
              <button type="button" class="btn btn-danger">Logout</button>
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
                  <th scope="col">Of</th>
                  <th scope="col">Ack by</th>
                  <th scope="col">Reason</th>
                </tr>
              </thead>

              <tbody>
                <?php foreach($dataKejadian as $datKej) :  ?>

                <tr>
                  <th scope="row"> <?=  $datKej['KJD_ID']; ?> </th>
                  <td> <?= $datKej['KJD_ON']; ?> </td>
                  <td> <?= $datKej['KJD_OF']; ?> </td>
                  <td>Act: <?= $datKej['KJD_ACT']; ?> 
                     <br>Dis: <?= $datKej['KJD_DIS']; ?> 
                  <td> <?= $datKej['R_ID_KJD']; ?></td>
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
