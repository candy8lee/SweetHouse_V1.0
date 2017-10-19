
  <?php if($page_num > 1){ ?>
  <li class="page-item">
    <a class="page-link" href="news_list.php?page=<?php echo $page_num-1; ?>">«</a>
  </li>
  <?php }else{ ?>
  <li class="page-item">
    <a class="page-link" href="#">«</a>
  </li>
  <?php }//上一頁 ?>

  <?php for($i=1; $i<=$totalpages; $i++){ ?>
  <li class="page-item">
    <a class="page-link" href="news_list.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
  </li>
  <?php }//頁數動態增加減少 ?>

  <?php if($page_num < $totalpages){ ?>
  <li class="page-item">
    <a class="page-link" href="news_list.php?page=<?php echo $page_num+1; ?>">»</a>
  </li>
  <?php }else{ ?>
  <li class="page-item">
    <a class="page-link" href="#">»</a>
  </li>
  <?php }//下一頁 ?>
