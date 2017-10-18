<?php
require_once('../../connection/database.php');
if(isset($_POST['MM_insert']) && $_POST['MM_insert'] == 'INSERT'){
  $sql= "INSERT INTO news( publishedDate, title, content, createdDate)
                    VALUES ( :publishedDate, :title, :content, :createdDate)";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":publishedDate", $_POST['publishedDate'], PDO::PARAM_STR);
  $sth ->bindParam(":title", $_POST['title'], PDO::PARAM_STR);
  $sth ->bindParam(":content", $_POST['content'], PDO::PARAM_STR);
  $sth ->bindParam(":createdDate", $_POST['createdDate'], PDO::PARAM_STR);
  $sth -> execute();

  header('Location: list.php');
}
?>

<!DOCTYPE html>
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
          <h1 class="display-3" contenteditable="true">最新消息管理-新增</h1>
          <a class="btn btn-primary my-2" href="list.php">上一頁</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form class="" method="post" action="add.php"  data-toggle="validator">
            <div class="form-group">
                <div class="col-sm-2">
                  <label for="publishedDate" class="control-label">發布日期</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="publishedDate" name="publishedDate" value="<?php echo date('y-m-d') ?>" required>
                <div class="help-block with-errors col-md-12" style="color:red;"></div>
              </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                  <label for="title" class="control-label">標題</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="title" name="title" data-minlength="3" data-error="標題至少三字元" required>
                <div class="help-block with-errors col-md-12" style="color:red;"></div>
              </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                  <label for="content" class="control-label">內容</label>
                </div>
                <div class="col-sm-10">
                  <textarea class="form-control" id="content" name="content" data-error="請輸入內文" required></textarea>
                  <div class="help-block with-errors col-md-12" style="color:blue;"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2 text-right">
                  <input type="hidden" name="MM_insert" value="INSERT">
                  <input type="text" name="createdDate" value="<?php echo date('y-m-d H:i:s') ?>">
                  <button type="submit" class="btn btn-primary">送出</button>
                </div>
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
