<?php
require_once("../../connection/database.php");
if(isset($_POST['MM_update']) && $_POST['MM_update'] == 'UPDATE'){
  $sql= "UPDATE  customer_order SET
                                    status= :status,
                                    address= :address,
                                    updatedDate= :updatedDate
                                    WHERE orderID= :orderID";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":status", $_POST['status'], PDO::PARAM_INT);
  $sth ->bindParam(":address", $_POST['address'], PDO::PARAM_STR);
  $sth ->bindParam(":updatedDate", $_POST['updatedDate'], PDO::PARAM_STR);
  $sth ->bindParam(":orderID", $_POST['orderID'], PDO::PARAM_INT);
  $sth -> execute();

  header("Location: list.php?Status=".$_POST['Status']);
}
$sql = "SELECT * FROM customer_order WHERE orderID=".$_GET['orderID'];
$sth = $db->query($sql);
$order = $sth->fetch(PDO::FETCH_ASSOC);

//由memberID取出訂購人名字
$sth = $db->query("SELECT * FROM member WHERE memberID=".$order['memberID']);
$member = $sth->fetch(PDO::FETCH_ASSOC);

 ?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include_once("../template/header.php"); ?>
  <script type="text/javascript">
    $(function() {
      $("#orderDate").datepicker({
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
          <h1 class="display-3" contenteditable="true">訂單管理-<?php echo $order['orderNO']; ?></h1>
          <hr></hr>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <form class="" method="post" action="edit.php?orderID=<?php $_GET['orderID']; ?>">
            <div class="form-group">
                <div class="col-sm-2">
                  <label for="orderDate" class="control-label">訂單日期</label>
                </div>
                <div class="col-sm-10">
                    <label for="orderDate" class="control-label"><?php echo $order['orderDate']; ?></label>
              </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                  <label for="orderNO" class="control-label">訂單編號</label>
                </div>
                <div class="col-sm-10">
                  <label for="orderNO" class="control-label"><?php echo $order['orderNO']; ?></label>
              </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                  <label for="status" class="control-label">訂單狀態</label>
                </div>
                <div class="col-sm-10">
                  <input type="radio" name="status" value="0" <?php if( $order['status'] == 0) echo "checked" ?>>待付款 / 新訂單
                  <input type="radio" name="status" value="1" <?php if( $order['status'] == 1) echo "checked" ?>>已付款 / 待出貨
                  <input type="radio" name="status" value="2" <?php if( $order['status'] == 2) echo "checked" ?>>已出貨 / 運送中
                  <input type="radio" name="status" value="3" <?php if( $order['status'] == 3) echo "checked" ?>>已送達 / 完成訂單
                  <input type="radio" name="status" value="99" <?php if( $order['status'] == 99) echo "checked" ?>>訂單取消
              </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                  <label for="member" class="control-label">訂購人</label>
                </div>
                <div class="col-sm-10">
                    <label for="member" class="control-label"><?php echo $member['name']; ?></label>
              </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">
                  <label for="address" class="control-label">地址</label>
                </div>
                <div class="col-sm-10">
                    <input type="text" name="address" value="<?php echo $order['address']; ?>">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-10 col-sm-offset-2 text-right">
                <input type="hidden" name="MM_update" value="UPDATE">
                <input type="hidden" name="Status" value="<?php echo $_GET['Status']; ?>">
                <input type="hidden" name="orderID" value="<?php echo $order['orderID']; ?>">
                <input type="text" name="updatedDate" value="<?php echo date('y-m-d H:i:s') ?>">
              <a class="btn btn-outline-primary mx-2" href="list.php">取消並回上一頁</a>
              <button type="submit" class="btn btn-primary">送出更新ㄌ</button>
              </div>
            </div>
          </form>
        </div>
      </div>
  </div>
</body>

</html>
