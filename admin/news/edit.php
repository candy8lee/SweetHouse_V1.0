<?php
require_once("../../connection/database.php");
if(isset($_POST['MM_update']) && $_POST['MM_update'] == 'UPDATE'){
  $sql= "UPDATE  news SET
                        publishedDate= :publishedDate,
                        title= :title,
                        content= :content,
                        updatedDate= :updatedDate
                        WHERE newsID= :newsID";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":publishedDate", $_POST['publishedDate'], PDO::PARAM_STR);
  $sth ->bindParam(":title", $_POST['title'], PDO::PARAM_STR);
  $sth ->bindParam(":content", $_POST['content'], PDO::PARAM_STR);
  $sth ->bindParam(":updatedDate", $_POST['updatedDate'], PDO::PARAM_STR);
  $sth ->bindParam(":newsID", $_POST['newsID'], PDO::PARAM_INT);
  $sth -> execute();

  header('Location: list.php');
}
$sql = "SELECT * FROM news WHERE newsID=".$_GET['newsID'];
$sth = $db->query($sql);
$news = $sth->fetch(PDO::FETCH_ASSOC);
 ?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include_once("../template/header.php"); ?>
  <script type="text/javascript">
    $(function() {
      $("#publishedDate").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        minDate: new Date(2010, 1 - 1, 1),
        maxDate: "+6m"
      });
    });
  </script>
</head>
<body>
  <?php include_once("../template/nav.php"); ?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-3" contenteditable="true">最新消息管理-<?php echo $news['title']; ?></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form class="" method="post" action="edit.php">
            <div class="form-group">
                <div class="col-sm-2">
                  <label for="publishedDate" class="control-label">發布日期</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="publishedDate" name="publishedDate" value="<?php echo $news['publishedDate'] ?>" required>
                <div class="help-block with-errors col-md-12" style="color:red;"></div>
              </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                  <label for="title" class="control-label">標題</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="title" name="title" value="<?php echo $news['title']; ?>" data-minlength="3" data-error="標題至少三字元" required>
                <div class="help-block with-errors col-md-12" style="color:red;"></div>
              </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                  <label for="content" class="control-label">內容</label>
                </div>
                <div class="col-sm-10">
                  <textarea class="form-control" id="content" name="content"><?php echo $news['content']; ?></textarea>
                  <div class="help-block with-errors col-md-12" style="color:blue;"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2 text-right">
                  <input type="hidden" name="MM_update" value="UPDATE">
                  <input type="hidden" name="newsID" value="<?php echo $news['newsID']; ?>">
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
