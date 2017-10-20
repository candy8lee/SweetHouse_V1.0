<?php
session_start();
$id = $_GET['CartID'];
unset($_SESSION['Cart'][$id]);
$_SESSION['Cart'] = array_values($_SESSION['Cart']);
header('Location: my_cart.php');
 ?>
