<?php
require_once('../../connection/database.php');
if(isset($_POST['MM_update']) && $_POST['MM_update'] == 'UPDATE'){

  $sql= "UPDATE  question_reply SET
                                title =:title,
                                categoryID =:categoryID,
                                reply =:reply,
                                updatedDate =:updatedDate,
                                author =:author
                                WHERE questionID= :questionID";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":title", $_POST['title'], PDO::PARAM_STR);
  $sth ->bindParam(":categoryID", $_POST['categoryID'], PDO::PARAM_INT);
  $sth ->bindParam(":reply", $_POST['reply'], PDO::PARAM_STR);
  $sth ->bindParam(":updatedDate", $_POST['updatedDate'], PDO::PARAM_STR);
  $sth ->bindParam(":author", $_POST['author'], PDO::PARAM_STR);
  $sth ->bindParam(":questionID", $_POST['questionID'], PDO::PARAM_INT);
  $sth -> execute();

  header("Location: list.php?cateID=".$_POST['categoryID']);
}
$sql = "SELECT * FROM question_reply WHERE questionID=".$_GET['questionID'];
$sth = $db->query($sql);
$question = $sth->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
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
          <h1 class="display-3" contenteditable="true">常見問題管理-<?php echo $question['title'];?></h1>
          <ul class="breadcrumb my-3" style="margin-bottom:0px;margin-top:0px">
            <li class="breadcrumb-item"><a href="#">主控台</a></li>
            <li class="breadcrumb-item"><a href="#"><?php echo $question['title'] ?></a></li>
            <li class="breadcrumb-item active">Link</li>
          </ul>
          <a class="btn btn-primary my-2" href="list.php?cateID=<?php echo $_GET['cateID'] ?>">上一頁</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form class="" method="post" action="edit.php"  data-toggle="validator">
             <div class="form-group">
                <div class="col-sm-2">
                  <label for="categoryID" class="control-label">問題分類代號</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="categoryID" name="categoryID" value="<?PHP echo $_GET['cateID'] ?>">
                  <div class="help-block with-errors col-md-12" style="color:red;"></div>
                </div>
              </div>
            <div class="form-group">
                <div class="col-sm-2">
                  <label for="title" class="control-label">標題</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="title" name="title" data-minlength="3" data-error="標題至少三字元" required value="<?php echo $question['title'];?>">
                  <div class="help-block with-errors col-md-12" style="color:red;"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="reply" class="control-label">回覆</label>
                </div>
                <div class="col-sm-10">
                  <textarea class="form-control" id="reply" name="reply" data-error="請輸入內文" required><?php echo $question['reply']; ?></textarea>
                  <div class="help-block with-errors col-md-12" style="color:blue;"></div>
                </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-2">
                    <label for="author" class="control-label">經辦</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="author" name="author" value="<?php echo $question['author'];?>">
                  </div>
                </div>
              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2 text-right">
                  <input type="hidden" name="MM_update" value="UPDATE">
                  <input type="text" name="questionID" value="<?php echo $_GET['questionID']; ?>">
                  <input type="text" name="updatedDate" value="<?php echo date('y-m-d H:i:s'); ?>">
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
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
  <script src="../../assets/js/validator.min.js"></script>
</body>

</html>
