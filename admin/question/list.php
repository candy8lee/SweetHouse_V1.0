<!DOCTYPE html>
<?php
require_once("../../connection/database.php");
$limit = 3;//news item 筆數限制
if (isset($_GET["page"])) { $page_num  = $_GET["page"]; } else { $page_num=1; };//判斷網址上有沒有頁碼、沒有就預設第一頁
$start_from = ($page_num-1) * $limit;//news item 從第幾筆開始//ex:(第二頁-1)*limit->[5]開始數五個出來//[0]開始

//第一種法子
$sth = $db->query("SELECT * FROM question_reply WHERE categoryID=".$_GET['cateID']." ORDER BY createdDate DESC LIMIT ".$start_from.",".$limit);
/*
第二種方法
$sql= "SELECT * FROM product WHERE categoryID= :categoryID ORDER BY createdDate DESC";
$sth = $db ->prepare($sql);
$sth ->bindParam(":categoryID", $_GET['cateID'], PDO::PARAM_INT);
$sth -> execute();*/

$all_question = $sth->fetchALL(PDO::FETCH_ASSOC);
$totalRows = count($all_question);

 ?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="..\CSS\admin.css" type="text/css"> </head>

<body>
  <?php include_once("../template/nav.php"); ?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-3" contenteditable="true">常見問題管理</h1>
          <a class="btn btn-primary my-2" href="add.php?cateID=<?php echo $_GET['cateID'] ?>">新增</a>
          <a class="btn btn-primary my-2" href="../question_category/list.php">返回</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb my-3" style="margin-bottom:0px;margin-top:0px">
            <li class="breadcrumb-item"><a href="#">主控台</a></li>
            <li class="breadcrumb-item"><a href="#">常見問題</a></li>
            <li class="breadcrumb-item active">Link</li>
          </ul>
          <table class="table">
            <thead>
              <tr>
                <th>標題</th>
                <th>編輯</th>
                <th>刪除</th>
              </tr>
            </thead>
            <tbody>
            <?php if ($totalRows > 0) {?>
              <?php foreach ($all_question as $row) { ?>
              <tr>
                <td><?php echo $row['title']; ?></td>
                <th><a href="edit.php?cateID=<?php echo $row['categoryID'] ?>&&questionID=<?php echo $row['questionID'];?>" class="btn btn-danger" role="button">編輯</a></th>
                <th><a href="delet.php?cateID=<?php echo $row['categoryID'] ?>&&questionID=<?php echo $row['questionID'];?>" class="btn btn-danger" role="button" onclick="if(!confirm('是否刪除此筆資料？')){return false;};"><i class="fa fa-trash-o" aria-hidden="true"></i></a></th>
              </tr>
            <?php }?>
          <?php }else{ ?>
              <tr>
                <td colspan="5">目前無資料，請<a class="btn btn-primary my-2" href="add.php?cateID=<?php echo $_GET['cateID'] ?>">新增</a>一筆。</td>
              </tr>
          <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php
            if($totalRows > 0){
              $sth = $db->query("SELECT * FROM question_reply WHERE categoryID=".$_GET['cateID']." ORDER BY createdDate DESC");
              $data_count = count($sth->fetchAll(PDO::FETCH_ASSOC));
              $totalpages = ceil($data_count / $limit );//四捨五入
          ?>
          <ul class="pagination ">
            <?php if($page_num > 1){ ?>
            <li class="page-item">
              <a class="page-link" href="list.php?page=<?php echo $page_num-1; ?>">«</a>
            </li>
            <?php }else{ ?>
            <li class="page-item">
              <a class="page-link" href="#">«</a>
            </li>
            <?php }//上一頁 ?>

            <?php for($i=1; $i<=$totalpages; $i++){ ?>
            <li class="page-item">
              <a class="page-link" href="list.php?cateID=<?php echo $_GET['cateID'] ?>&&page=<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
            <?php }//頁數動態增加減少 ?>

            <?php if($page_num < $totalpages){ ?>
            <li class="page-item">
              <a class="page-link" href="list.php?cateID=<?php echo $_GET['cateID'] ?>&&page=<?php echo $page_num+1; ?>">»</a>
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
