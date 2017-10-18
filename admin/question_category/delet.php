<?php
require_once('../../connection/database.php');
$sth = $db-> query("DELETE FROM question_category WHERE categoryID=".$_GET['cateID']);
header('Location: list.php');
 ?>
