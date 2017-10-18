<?php
require_once('../../connection/database.php');
$sth = $db-> query("DELETE FROM question_reply WHERE questionID=".$_GET['questionID']);
header("Location: list.php?cateID=".$_GET['cateID']);
 ?>
