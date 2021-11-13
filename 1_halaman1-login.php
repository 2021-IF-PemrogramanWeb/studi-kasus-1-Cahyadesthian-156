<?php 
session_start();


if(isset($_SESSION['login'])) {
  header("Location: 2_halaman-tabel.php");
  exit;
}

require_once 'functions.php';

if(!isset($_GET["log"])) {
  $error = "";
} else {
  $error = "username/password salah";
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

        <form action="aturlogin.php" method="POST">
          <img id="icon-wolf" class="mx-auto d-block" src="wolf-icon.png" alt="" width="72" height="auto">
          
          <p class="text-center text-danger"><?= $error; ?></p>
      

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