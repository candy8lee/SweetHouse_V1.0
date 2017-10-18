<?php
require_once('../../connection/database.php');
$sth = $db-> query("DELETE FROM member WHERE memberID=".$_GET['memberID']);
header('Location: list.php');
 ?>
