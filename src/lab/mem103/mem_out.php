<?php
session_start();
unset($_SESSION['mail']);
unset($_SESSION['name']);
unset($_SESSION['auth']);
header('location:mem103.php');
?>