<?php
session_start();

session_destroy();
header("Location: 1_halaman1-login.php");
exit;

?>