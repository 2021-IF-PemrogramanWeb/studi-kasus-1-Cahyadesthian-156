<?php 

session_start();

require_once 'functions.php';

$username_logged =  $_POST["username"];
$password_logged = $_POST["password"];

$queryLoginInfo= "SELECT * FROM user WHERE USR_USERNAME = '$username_logged' && USR_PASSSWORD = '$password_logged' " ;
$conn = koneksi();
$cekLogin = mysqli_query($conn, $queryLoginInfo);

if( mysqli_num_rows($cekLogin) != 1 ) {

    header("Location: 1_halaman1-login.php?log=1");
      
} 

if( mysqli_num_rows($cekLogin) === 1 ) {

    $_SESSION["login"] = true;
    $someoneData = mysqli_fetch_assoc($cekLogin);
    $_SESSION["user_id"] = $someoneData["USR_ID"];

} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Login</title>
</head>
<body>

<form name="myForm" id="myForm" target="" action="2_halaman-tabel.php" method="POST">
        <input type="number" class="form-control" name="user_id_login" required placeholder="user_id_login" value="<?= $someoneData['USR_ID']; ?>">
        <input type="submit" value="Submit" />
</form>

<script type="text/javascript">
    window.onload=function(){
          document.forms["myForm"].submit();
    }
</script>

    
</body>
</html>



