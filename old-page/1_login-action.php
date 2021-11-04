<?php

$emailInput = $_POST['email'];
$passwordInput = $_POST['password'];

echo '<br>';
var_dump($_POST);
echo '<br>';

if($emailInput == "cahyadesthian@mail.com" && $passwordInput == "tesPassword") {
    echo "Login Berhasil";
} else {
    echo "Login Gagal";
}



?>