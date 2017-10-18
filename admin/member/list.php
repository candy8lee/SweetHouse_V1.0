<!DOCTYPE html>
<?php
require_once("../../connection/database.php");
$limit = 2;//news item 筆數限制
if (isset($_GET["page"])) { $page_num  = $_GET["page"]; } else { $page_num=1; };//判斷網址上有沒有頁碼、沒有就預設第一頁
$start_from = ($page_num-1) * $limit;//news item 從第幾筆開始//ex:(第二頁-1)*limit->[5]開始數五個出來//[0]開始
$sql = "SELECT * FROM member ORDER BY createdDate DESC LIMIT ".$start_from.",".$limit;
$sth = $db->query($sql);
$all_news = $sth->fetchALL(PDO::FETCH_ASSOC);
$totalRows = count($all_news);
?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include_once("../template/header.php"); ?>
</head>

<body>
  <?php include_once("../template/nav.php"); ?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-3" contenteditable="true">會員管理</h1>
          <a class="btn btn-primary my-2" href="add.php">新增</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumb my-3" style="margin-bottom:0px;margin-top:0px">
            <li class="breadcrumb-item">
              <a href="#">主控台</a>
            </li>
            <li class="breadcrumb-item active">Link</li>
          </ul>
          <table class="table">
            <thead>
              <tr>
                <th>會員姓名</th>
                <th>會員帳號</th>
                <th>行動電話</th>
                <th>E-MAIL</th>
                <th>編輯</th>
                <th>刪除</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($all_news as $row) { ?>
              <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['account']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <th><a href="edit.php?memberID=<?php echo $row['memberID'];?>" class="btn btn-danger" role="button">編輯</a></th>
                <th><a href="delet.php?memberID=<?php echo $row['memberID'];?>" class="btn btn-danger" role="button" onclick="if(!confirm('是否刪除此筆資料？')){return false;};">刪除</a></th>
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
              $sth = $db->query("SELECT * FROM member ORDER BY createdDate DESC");
              $data_count = count($sth->fetchAll(PDO::FETCH_ASSOC));
              $totalpages = ceil($data_count / $limit );//四捨五入
          ?>
          <ul class="pagination ">
            <?php include_once("../template/page_num.php"); ?>
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
