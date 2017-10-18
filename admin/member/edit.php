<?php
require_once("../../connection/database.php");
if(isset($_POST['MM_update']) && $_POST['MM_update'] == 'UPDATE'){
  $sql= "UPDATE member SET
                        picture= :picture,
                        name= :name,
                        account =:account,
                        phone= :phone,
                        email= :email,
                        address= :address,
                        updatedDate= :updatedDate
                        WHERE memberID= :memberID";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":picture", $_POST['picture'], PDO::PARAM_STR);
  $sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
  $sth ->bindParam(":account", $_POST['account'], PDO::PARAM_STR);
  $sth ->bindParam(":phone", $_POST['phone'], PDO::PARAM_STR);
  $sth ->bindParam(":email", $_POST['email'], PDO::PARAM_STR);
  $sth ->bindParam(":address", $_POST['address'], PDO::PARAM_STR);
  $sth ->bindParam(":updatedDate", $_POST['updatedDate'], PDO::PARAM_STR);
  $sth ->bindParam(":memberID", $_POST['memberID'], PDO::PARAM_INT);
  $sth -> execute();

  header('Location: list.php');
}
$sql = "SELECT * FROM member WHERE memberID=".$_GET['memberID'];
$sth = $db->query($sql);
$member = $sth->fetch(PDO::FETCH_ASSOC);
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
          <h1 class="display-3" contenteditable="true">會員管理-<?php echo $member['account']; ?></h1>
          <a class="btn btn-primary my-2" href="list.php">上一頁</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form class="" method="post" action="edit.php"  data-toggle="validator">
          <div class="form-group">
            <div class="col-sm-2">
              <label for="picture" class="control-label">頭像</label>
            </div>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="picture" name="picture" data-error="請上傳圖片"/>
              <div class="help-block with-errors col-md-12" style="color:blue;"></div>
            </div>
          </div>
            <div class="form-group">
                <div class="col-sm-2">
                  <label for="name" class="control-label">會員姓名</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" name="name" data-minlength="3" data-error="至少一字元" required value="<?php echo $member['name']?>">
                  <div class="help-block with-errors col-md-12" style="color:red;"></div>
                </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-2">
                    <label for="account" class="control-label">帳號</label>
                  </div>
                  <div class="col-sm-10">
                    <label for="account" class="control-label"><?php echo $member['account']; ?></label>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-2">
                    <label for="phone" class="control-label">電話</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="phone" name="phone" class="form-control" data-minlength="8" data-error="電話號碼至少8碼" required  value="<?php echo $member['phone']?>">
                    <div class="help-block with-errors col-md-12" style="color:red;"></div>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-2">
                    <label for="email" class="control-label">E-MAIL</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="email" name="email" class="form-control" data-error="請輸入郵箱" required value="<?php echo $member['email']?>">
                    <div class="help-block with-errors col-md-12" style="color:red;"></div>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-2">
                    <label for="address" class="control-label">地址</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="address" name="address" class="form-control" data-error="請輸入地址" required value="<?php echo $member['address']?>">
                    <div class="help-block with-errors col-md-12" style="color:red;"></div>
                  </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2 text-right">
                  <input type="hidden" name="MM_update" value="UPDATE">
                  <input type="hidden" name="memberID" value="<?php echo $member['memberID']?>">
                  <input type="text" name="updatedDate" value="<?php echo date('y-m-d H:i:s') ?>">
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
