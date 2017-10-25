<?php
  switch ($_GET['Status']) {
    case 0:
      echo "待付款 / 新訂單";
      break;
    case 1:
      echo "已付款 / 待出貨";
      break;
    case 2:
      echo "已出貨 / 運送中";
      break;
    case 3:
      echo "已送達 / 完成訂單";
      break;
    case 99:
      echo "訂單取消";
      break;
  }
 ?>
