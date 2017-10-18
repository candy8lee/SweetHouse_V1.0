<?php
require_once("../../connection/database.php");
if(isset($_POST['MM_update']) && $_POST['MM_update'] == 'UPDATE'){
  $sql= "UPDATE  page SET
                        content= :content,
                        updatedDate= :updatedDate
                        WHERE pageID= :pageID";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":content", $_POST['content'], PDO::PARAM_STR);
  $sth ->bindParam(":updatedDate", $_POST['updatedDate'], PDO::PARAM_STR);
  $sth ->bindParam(":pageID", $_POST['pageID'], PDO::PARAM_INT);
  $sth -> execute();

  header("Location: edit.php?pageID=". $_POST['pageID']);
}
$sql = "SELECT * FROM page WHERE pageID=".$_GET['pageID'];
$sth = $db->query($sql);
$pages = $sth->fetch(PDO::FETCH_ASSOC);
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
          <h1 class="display-3" contenteditable="true"><?php echo $pages['title']; ?>管理</h1>
        </div>
      </div>
      <div class="col-md-12">
        <ul class="breadcrumb my-3" style="margin-bottom:0px;margin-top:0px">
          <li class="breadcrumb-item"><a href="#">主控台</a></li>
          <li class="breadcrumb-item"><a href="#"><?php echo $pages['title'];?>管理</a></li>
          <li class="breadcrumb-item active">Link</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form class="" method="post" action="edit.php">
            <div class="form-group">
                <div class="col-sm-12">
                  <label for="content" class="control-label"><?php echo $pages['title'];?>內容</label>
                </div>
                <div class="col-sm-12">
                  <textarea class="form-control" id="content" name="content"><?php echo $pages['content']; ?></textarea>
                  <div class="help-block with-errors col-md-12" style="color:blue;"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2 text-right">
                  <input type="hidden" name="MM_update" value="UPDATE">
                  <input type="hidden" name="pageID" value="<?php echo $pages['pageID']; ?>">
                  <input type="text" name="updatedDate" value="<?php echo date('y-m-d H:i:s') ?>">
              <a class="btn btn-outline-primary mx-2" href="list.php">取消並回上一頁</a>
              <button type="submit" class="btn btn-primary">送出更新ㄌ</button>
            </div>
          </form>
        </div>
      </div>
      <div class="row"> </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="pagination my-4">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">«</span> <span class="sr-only">Previous</span> </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">4</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next"> <span aria-hidden="true">»</span> <span class="sr-only">Next</span> </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
