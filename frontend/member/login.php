<?php
session_start();
require('../backend/function/connection.php');

$sth = $db->query("SELECT * FROM member WHERE Account='".$_POST['Account']."' AND Password='".$_POST['Password']."'");

$member = $sth->fetch(PDO::FETCH_ASSOC);

if($member != NULL){
  $_SESSION['Account'] = $member['Account'];
  header('Location: member_edit.php');
}else{
  header('Location: login_error.php');
}
 ?>
