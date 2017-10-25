<?php
require_once("../../connection/database.php");
$sql = "select * from page";
$result = $db->query($sql);
$page = $result->fetchAll(PDO::FETCH_ASSOC);
 ?>
<nav class="navbar navbar-expand-md bg-primary navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="../news/list.php"><b>SweetHouse<br></b></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
      <ul class="navbar-nav">
        <li class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">頁面管理
          <span class="caret"></span></button>
          <ul class="dropdown-menu">
            <?php foreach($page as $row){ ?>
                <li><a href="../page/edit.php?pageID=<?php echo $row['pageID']; ?>"><?php echo $row['title']; ?></a></li>
            <?php } ?>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../news/list.php">消息管理</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../product_category/list.php">產品管理</a>
        </li>
        <li class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">訂單管理
          <span class="caret"></span></button>
          <ul class="dropdown-menu">
                <li><a href="../customer_order/list.php?Status=0">待付款 / 新訂單</a></li>
                <li><a href="../customer_order/list.php?Status=1">已付款 / 出貨中</a></li>
                <li><a href="../customer_order/list.php?Status=2">已出貨 / 運送中</a></li>
                <li><a href="../customer_order/list.php?Status=3">已送達 / 訂單完成</a></li>
                <li><a href="../customer_order/list.php?Status=99">訂單取消</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../member/list.php">會員管理</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../question_category/list.php">常見問題</a>
        </li>
      </ul>
      <a href="../template/logout.php" class="btn navbar-btn btn-primary ml-2 text-white"><i class="fa d-inline fa-lg fa-user-circle-o"></i> Sign out</a>
    </div>
  </div>
</nav>
