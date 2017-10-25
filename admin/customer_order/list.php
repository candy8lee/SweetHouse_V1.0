<?php
require_once("../template/login_check.php");
require_once("../../connection/database.php");
$limit = 25;//news item 筆數限制
if (isset($_GET["page"])) { $page_num  = $_GET["page"]; } else { $page_num=1; };//判斷網址上有沒有頁碼、沒有就預設第一頁
$start_from = ($page_num-1) * $limit;//news item 從第幾筆開始//ex:(第二頁-1)*limit->[25]開始數25個出來//[0]開始
$sql = "SELECT * FROM customer_order WHERE status = ".$_GET['Status']." ORDER BY orderDate DESC LIMIT ".$start_from.",".$limit;// LIMIT num,num
$sth = $db->query($sql);
$all_orders = $sth->fetchALL(PDO::FETCH_ASSOC);
$totalRows = count($all_orders);
 ?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../CSS/admin.css" type="text/css">
</head>

<body>
  <?php include_once("../template/nav.php"); ?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-3" contenteditable="true">訂單管理</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb my-3" style="margin-bottom:0px;margin-top:0px">
            <li class="breadcrumb-item">
              <a href="#">主控台</a>
            </li>
            <li class="breadcrumb-item active">訂單管理：
            <?php require_once('../template/status.php'); ?>
            </li>
          </ul>
          <table class="table">
            <thead>
              <tr>
                <th>訂單日期</th>
                <th>訂單編號</th>
                <th>訂購人</th>
                <th>行動電話</th>
                <th>地址</th>
                <th>總金額</th>
                <th>編輯</th>
                <th>訂單明細</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($all_orders as $row) { ?>
              <tr>
                <td><?php echo $row['orderDate']; ?></td>
                <td><?php echo $row['orderNO']; ?></td>
                <td><?php echo $row['memberID']; ?></td>
                <td><?php echo $row['mobilephone']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['totalPrice']; ?></td>
                <th><a href="edit.php?Status=<?php echo $_GET['Status'];?>&orderID=<?php echo $row['orderID']; ?>" class="btn btn-danger" role="button">進入</a></th>
                <th><a href="../order_details/list.php?orderID=<?php echo $row['orderID']; ?>&page=<?php echo $page_num;?>" class="btn btn-danger" role="button">明細</a></th>
              </tr>
            <?php }?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php
            if($totalRows > 0){
              $sth = $db->query("SELECT * FROM customer_order ORDER BY orderDate DESC");
              $data_count = count($sth->fetchAll(PDO::FETCH_ASSOC));
              $totalpages = ceil($data_count / $limit );//四捨五入
          ?>
          <ul class="pagination ">
            <?php if($page_num > 1){ ?>
            <li class="page-item">
              <a class="page-link" href="list.php?Status=<?php echo $_GET['Status'];?>&page=<?php echo $page_num-1; ?>">«</a>
            </li>
            <?php }else{ ?>
            <li class="page-item">
              <a class="page-link" href="#">«</a>
            </li>
            <?php }//上一頁 ?>

            <?php for($i=1; $i<=$totalpages; $i++){ ?>
            <li class="page-item">
              <a class="page-link" href="list.php?Status=<?php echo $_GET['Status'];?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
            <?php }//頁數動態增加減少 ?>

            <?php if($page_num < $totalpages){ ?>
            <li class="page-item">
              <a class="page-link" href="list.php?Status=<?php echo $_GET['Status'];?>&page=<?php echo $page_num+1; ?>">»</a>
            </li>
            <?php }else{ ?>
            <li class="page-item">
              <a class="page-link" href="#">»</a>
            </li>
            <?php }//下一頁 ?>
          </ul>
        <?php }//if totalRows > 0 ?>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>
