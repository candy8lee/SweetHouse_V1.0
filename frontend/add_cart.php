<?php
session_start();
$is_existed = "false";

//判斷商品是否重複
if(isset($_SESSION['Cart']) && $_SESSION['Cart'] != null){
    for($i= 0; $i < count($_SESSION['Cart']); $i++ ){
        if($_POST['ProductID'] == $_SESSION['Cart'][$i]['ProductID']){
          $is_existed = "true";
          goto_previousPage($is_existed);
        }
    }
}

if($is_existed == "false"){
  //接受的資料存到temp array
  $temp['ProductID'] = $_POST['ProductID'];
  $temp['Name']      = $_POST['Name'];
  $temp['Picture']   = $_POST['Picture'];
  $temp['Price']     = $_POST['Price'];
  $temp['Quantity']  = $_POST['Quantity'];
  $temp['CateID']     = $_POST['CateID'];

  //temp->Session
  $_SESSION['Cart'][] = $temp;
  goto_previousPage($is_existed);

}


function goto_previousPage($is_existed){
      $url = explode('?', $_SERVER['HTTP_REFERER']);
      $location = $url[0];
      $location.= "?cateID=".$_POST['CateID'];
      $location.= "&productID=".$_POST['ProductID'];
      $location.= "&Existed=".$is_existed;

      header(sprintf('Location: %s ', $location));
}




 ?>
