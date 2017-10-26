<?php
require_once('../../connection/database.php');
$sth = $db->query("SELECT * FROM product WHERE productID=".$_GET['productID']);
$product = $sth->fetch(PDO::FETCH_ASSOC);
$delete = "../../uploads/products/".$product['picture'];
unlink($delete);
$sth = $db-> query("DELETE FROM product WHERE productID=".$_GET['productID']);
header("Location: list.php?cateID=".$_GET['cateID']);
 ?>
