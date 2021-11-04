<?php 
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "pwebtabelgrafik";
$message = "";
try {
    $connection = new PDO("mysql:host=$host; dbname=$database", $username, $password);

    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST["user"])) {
        if(empty($_POST["username"]) || empty($_POST["password"])) {
            $message = '<label>All Field is Required</label>';
        } else {
            $query = "SELECT * FROM user WHERE username = :USER_ID AND password = :USER_PASS";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    'username' => $_POST["username"],
                    'password' => $_POST["password"]
                )
            );
            $count = $statement->rowCount();
            if($count > 0) {
                $_SESSION["username"] = $_POST["username"];
                header("location:login_success.php");
            } else {
                $message = '<label>Username or Pass is wrong</label>';
            }

        }
    }
}

catch(PDOException $error) {
    $message = $error->getMessage();
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

        <?php
            if(isset($message)) {
                echo '<label class="text-danger">'.$message.'</label>';
            }
        ?>

        <form method="post">
          <img id="icon-wolf" class="mx-auto d-block" src="wolf-icon.png" alt="" width="72" height="auto">
          <!-- <h1 class="h3 mb-3 fw-normal text-center">Login</h1> -->
      
          <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">Email</label>
          </div>

          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
          </div>
      
          <div class="checkbox mb-3 text-center">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
          <p class="mt-5 mb-3 text-muted text-center">Pemrograman Web Kelas E</p>
        </form>
      </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>