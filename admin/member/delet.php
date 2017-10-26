<?php
require_once('../../connection/database.php');
$sth = $db->query("SELECT * FROM member WHERE memberID=".$_GET['memberID']);
$member = $sth->fetch(PDO::FETCH_ASSOC);
$delete = "../../uploads/member_pic/".$member['picture'];
unlink($delete);
$sth = $db-> query("DELETE FROM member WHERE memberID=".$_GET['memberID']);
header('Location: list.php');
 ?>
