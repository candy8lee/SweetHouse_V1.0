<?php
session_start();
require_once('../../connection/database.php');
$sth = $db->query("SELECT * FROM member WHERE account='".$_POST['account']."' AND password='".$_POST['password']."'");
$member = $sth->fetch(PDO::FETCH_ASSOC);

if($member != NULL){
  $_SESSION['account'] = $member['account'];
  header('Location: member_edit.php');
}else{
  header('Location: login_error.php');
}
 ?>
