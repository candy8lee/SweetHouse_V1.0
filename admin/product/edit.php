<?php
require_once("../../connection/database.php");
if(isset($_POST['MM_update']) && $_POST['MM_update'] == 'UPDATE'){

  if(isset($_FILES['picture']['name']) && $_FILES['picture']['name'] != null){
    if (!file_exists('../../uploads/products')) mkdir('../../uploads/products', 0755, true);
    $fileTYPE = strrchr($_FILES['picture']['name'],".");//查找字串，遇到"."停止->分割副檔名
    //$filename = rand().$fileTYPE;//亂數連接副檔名->rename
    $filename = mt_rand().date('ymdhis').$fileTYPE;
    move_uploaded_file($_FILES['picture']['tmp_name'],"../../uploads/products/".$filename);   // 搬移上傳檔案
    unlink("../../uploads/products/".$_POST['picture1']);
  }else{
    $filename = $_POST['picture1'];
  }

  $sql= "UPDATE product SET
                        picture= :picture,
                        name= :name,
                        price= :price,
                        remain= :remain,
                        decription= :decription,
                        updatedDate= :updatedDate
                        WHERE productID= :productID";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":picture", $filename, PDO::PARAM_STR);
  $sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
  $sth ->bindParam(":price", $_POST['price'], PDO::PARAM_INT);
  $sth ->bindParam(":remain", $_POST['remain'], PDO::PARAM_STR);
  $sth ->bindParam(":decription", $_POST['decription'], PDO::PARAM_STR);
  $sth ->bindParam(":updatedDate", $_POST['updatedDate'], PDO::PARAM_STR);
  $sth ->bindParam(":productID", $_POST['productID'], PDO::PARAM_INT);
  $sth -> execute();

  //多一個隱藏欄位為了抓取categoryID、submit之後只能用POST不能用GET
  header("Location: list.php?cateID=".$_POST['cateID']);
}

$sql = "SELECT * FROM product WHERE productID=".$_GET['productID'];
$sth = $db->query($sql);
$product = $sth->fetch(PDO::FETCH_ASSOC);
 ?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include_once("../template/header.php"); ?>
  <script type="text/javascript">
    $(function() {
      $("#remain").datepicker({
        dateFormat: "yy-mm-dd",
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
          <h1 class="display-3" contenteditable="true">商品管理-<?php echo $product['name'];?></h1>
          <a class="btn btn-primary my-2" href="list.php?cateID=<?php echo $_GET['cateID'] ?>">上一頁</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form class="" method="post" action="edit.php"  data-toggle="validator" enctype="multipart/form-data">
            <div class="form-group">
              <div class="col-sm-2">
                <label for="picture" class="control-label">圖片</label>
              </div>
              <div class="col-sm-10">
                <img src="../../uploads/products/<?php echo $product['picture']; ?>"><?php echo $product['picture']; ?>
                <input type="file" class="form-control" id="picture" name="picture">
                <input type="hidden" name="picture1" value="<?php echo $product['picture']; ?>">
                <div class="help-block with-errors col-md-12" style="color:blue;"></div>
              </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                  <label for="name" class="control-label">品名</label>
                </div>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" name="name" data-minlength="3" data-error="標題至少三字元" required value="<?php echo $product['name'];?>">
                  <div class="help-block with-errors col-md-12" style="color:red;"></div>
                </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-2">
                    <label for="price" class="control-label">價格</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="number" id="price" name="price" class="form-control" data-error="請輸入價格" required  value="<?php echo $product['price'];?>">
                    <div class="help-block with-errors col-md-12" style="color:red;"></div>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-2">
                    <label for="remain" class="control-label">保存期限</label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="remain" name="remain" data-error="請輸入日期" required  value="<?php echo $product['remain'];?>">
                    <div class="help-block with-errors col-md-12" style="color:red;"></div>
                  </div>
              </div>
              <div class="form-group">
                <div class="col-sm-2">
                  <label for="decription" class="control-label">產品說明</label>
                </div>
                <div class="col-sm-10">
                  <textarea class="form-control" id="decription" name="decription" data-error="請輸入內文" required><?php echo $product['decription'];?></textarea>
                  <div class="help-block with-errors col-md-12" style="color:blue;"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2 text-right">
                  <input type="hidden" name="MM_update" value="UPDATE">
                  <input type="hidden" name="productID" value="<?php echo $product['productID']?>">
                  <!--多一個隱藏欄位為了抓取categoryID、submit之後只能用POST不能用GET-->
                  <input type="hidden" name="cateID" value="<?php echo $product['categoryID']?>">
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
</body>

</html>
