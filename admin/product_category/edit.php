<?php
require_once("../../connection/database.php");
if(isset($_POST['MM_update']) && $_POST['MM_update'] == 'UPDATE'){
  $sql= "UPDATE product_category SET
                                  category= :category
                                 WHERE categoryID= :categoryID";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":category", $_POST['category'], PDO::PARAM_STR);
  $sth ->bindParam(":categoryID", $_POST['categoryID'], PDO::PARAM_INT);
  $sth -> execute();

  header('Location: list.php');
}
$sql = "SELECT * FROM product_category WHERE categoryID=".$_GET['cateID'];
$sth = $db->query($sql);
$name = $sth->fetch(PDO::FETCH_ASSOC);
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
          <h1 class="display-3" contenteditable="true">商品分類管理-<?php echo $name['categoryID']; ?></h1>
          <a class="btn btn-primary my-2" href="list.php">上一頁</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form class="" method="post" action="edit.php"  data-toggle="validator">
            <div class="form-group">
                <div class="col-sm-2">
                  <label for="Title" class="control-label">分類名稱</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="category" name="category" data-minlength="1" data-error="分類至少一字元" required value="<?php echo $name['category'];?>">
                  <div class="help-block with-errors col-md-12" style="color:red;"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2 text-right">
                  <input type="hidden" name="MM_update" value="UPDATE">
                  <input type="hidden" name="categoryID" value="<?php echo $name['categoryID']; ?>">
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
  <script src="../../js/validator.min.js"></script>
</body>

</html>
