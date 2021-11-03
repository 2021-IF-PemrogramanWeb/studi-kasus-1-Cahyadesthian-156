<?php 
session_start();

if(isset($_SESSION['login'])) {
  header("Location: 2_halaman-tabel.php");
  exit;
}

require_once 'functions.php';

// tombol login ditekan
if(isset($_POST['login'])) {
  $login = login($_POST);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman 1 - Login</title>
    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="1_halaman1-login.css">
</head>

<body>
    
    

    <main class="form-signin card" >

        <form action="" method="post">
          <img id="icon-wolf" class="mx-auto d-block" src="wolf-icon.png" alt="" width="72" height="auto">
          <!-- <h1 class="h3 mb-3 fw-normal text-center">Login</h1> -->
      
          <?php if(isset($login['error'])) : ?>
            <p class="text-center text-danger"><?= $login['pesan']; ?></p>
          <?php endif; ?>

          <div class="form-floating">
            <input type="text" class="form-control" name="username" autofocus autocomplete="off" required placeholder="username">
            <label >Username</label>
          </div>

          <div class="form-floating">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <label >Password</label>
          </div>
      
          <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Login</button>
          <p class="mt-5 mb-3 text-muted text-center">Pemrograman Web Kelas E</p>
        </form>
      </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>