<?php
require_once('../../connection/database.php');
if(isset($_POST['MM_insert']) && $_POST['MM_insert'] == 'INSERT'){
  //upload pictures
  if(isset($_FILES['picture']['name']) && $_FILES['picture']['name'] != null){
    if (!file_exists('../../uploads/products')) mkdir('../../uploads/products', 0755, true);
    $fileTYPE = strrchr($_FILES['picture']['name'],".");//查找字串，遇到"."停止->分割副檔名
    $filename = $_POST['account'].rand().$fileTYPE;//亂數連接副檔名->rename
    //$filename = md5($_FILES['picture']['name']).$fileTYPE;
    move_uploaded_file($_FILES['picture']['tmp_name'],"../../uploads/products/".$filename);   // 搬移上傳檔案
  }

  $sql= "INSERT INTO member( account, password, name, picture, phone, email, address, createdDate)
                    VALUES ( :account, :password, :name, :picture, :phone, :email, :address, :createdDate)";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":account", $_POST['account'], PDO::PARAM_STR);
  $sth ->bindParam(":password", $_POST['password'], PDO::PARAM_STR);
  $sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
  $sth ->bindParam(":picture", $_POST['picture'], PDO::PARAM_STR);
  $sth ->bindParam(":phone", $_POST['phone'], PDO::PARAM_STR);
  $sth ->bindParam(":email", $_POST['email'], PDO::PARAM_STR);
  $sth ->bindParam(":address", $_POST['address'], PDO::PARAM_STR);
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
 </head>

<body>
  <?php include_once("../template/nav.php"); ?>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-3" contenteditable="true">會員管理</h1>
          <a class="btn btn-primary my-2" href="list.php">上一頁</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form class="" method="post" action="add.php"  data-toggle="validator">
          <div class="form-group">
            <div class="col-sm-2">
              <label for="picture" class="control-label">頭像</label>
            </div>
            <div class="col-sm-10">
              <input type="file" class="form-control" id="picture" name="picture">
            </div>
          </div>
            <div class="form-group">
                <div class="col-sm-2">
                  <label for="name" class="control-label">會員姓名</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" name="name" data-minlength="1" data-error="至少一字元" required>
                  <div class="help-block with-errors col-md-12" style="color:red;"></div>
                </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-2">
                    <label for="account" class="control-label">帳號</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="account" name="account" class="form-control" data-minlength="1" data-error="至少一字元" required>
                    <div class="help-block with-errors col-md-12" style="color:red;"></div>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-2">
                    <label for="password" class="control-label">密碼</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="password" name="password" class="form-control" data-minlength="1" data-error="至少一字元" required>
                    <div class="help-block with-errors col-md-12" style="color:red;"></div>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-2">
                    <label for="phone" class="control-label">電話</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="phone" name="phone" class="form-control" data-minlength="8" data-error="電話號碼至少8碼" required>
                    <div class="help-block with-errors col-md-12" style="color:red;"></div>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-2">
                    <label for="email" class="control-label">E-MAIL</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="email" name="email" class="form-control" data-error="請輸入郵箱" required>
                    <div class="help-block with-errors col-md-12" style="color:red;"></div>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-2">
                    <label for="address" class="control-label">地址</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" id="address" name="address" class="form-control" data-error="請輸入地址" required>
                    <div class="help-block with-errors col-md-12" style="color:red;"></div>
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
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
  <script src="../../js/validator.min.js"></script>
</body>

</html>
