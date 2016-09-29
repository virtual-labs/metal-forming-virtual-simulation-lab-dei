<?php
session_start();
ini_set("display_errors","Off");
unset($_SESSION['mail']);
unset($_SESSION['name']);
unset($_SESSION['auth']);
header('location:mem103.php');
?>