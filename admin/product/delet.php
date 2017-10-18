<?php
require_once('../../connection/database.php');
$sth = $db-> query("DELETE FROM product WHERE productID=".$_GET['productID']);
header("Location: list.php?cateID=".$_GET['cateID']);
 ?>
