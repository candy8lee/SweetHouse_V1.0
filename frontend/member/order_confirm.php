<?php
session_start();
if($_SESSION['account'] == null) header('Location: member_apply.php');
require_once("../../connection/database.php");

$sth = $db->query("SELECT * FROM member WHERE account='".$_SESSION['account']."'");
$member = $sth->fetch(PDO::FETCH_ASSOC);
 ?>
<!doctype html>
<!-- Website ../template by freewebsite../templates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cake House-我的購物車</title>
	<?php require_once("../template/files2.php"); ?>
	<link rel="stylesheet" href="../assets/css/cart.css">
</head>

<body>
	<div id="page">
		<?php require_once("../template/header2.php"); ?>
		<div id="body" class="contact">
			<div class="header">
				<div>
					<h1>會員專區</h1>
				</div>
			</div>
			<div class="body">

			</div>
			<div class="footer">
				<ul class="Category">
					<li><a href="member_edit.php">會員資料修改</a></li>
					<li><a href="my_cart.php">我的購物車</a></li>
					<li><a href="my_orders.php">我的訂單</a></li>
				</ul>
				<div id="OrderForm">
					<h1>商品資訊</h1>
						<table id="order-tables">
            	<thead>
            		<tr>
            			<th width="15%">商品圖片</th>
            			<th width="35%">商品名稱</th>
									<th width="10%" class="price">單價</th>
            			<th width="20%" class="quantity">數量</th>
            			<th width="20%" class="subtotal">小計</th>
            		</tr>
            	</thead>
              <tbody>
									<?php $totalprice = 0; ?>
									<?php for( $i=0; $i < count($_SESSION['Cart']); $i++){ ?>
	                <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
										<td data-title="商品圖片">
												<a href=""><img src="../../uploads/products/<?php echo $_SESSION['Cart'][$i]['Picture']; ?>" alt="" width="200" height="150"></a>
										</td>
										<td class="cart_description" data-title="商品名稱">
												<h4><a href=""><?php echo $_SESSION['Cart'][$i]['Name']; ?></a></h4>
										</td>
	                  <td data-title="單價">$NT <?php echo $_SESSION['Cart'][$i]['Price']; ?></td>
	                  <td class="quantity" data-title="數量"><?php echo $_SESSION['Cart'][$i]['Quantity']; ?></td>
										<td data-title="小計">$NT <?php $subtotal = $_SESSION['Cart'][$i]['Price'] * $_SESSION['Cart'][$i]['Quantity']; echo $subtotal; ?></td>
	                </tr>
									<?php $totalprice += $subtotal; } ?>
								<tr>
                  <td colspan="1" ><a href="my_cart.php" class="edit-button cart" style="float:left;">返回編輯</a></td>
									<td colspan="3" style="text-align: right;font-weight:bold;">運費 $NT <?php if($totalprice >= 788) $shipping = 0; else $shipping=160; echo $shipping; ?></td>
									<td colspan="3" style="text-align: right;font-weight:bold;">總金額 $NT <?php echo $totalprice; ?></td>
								</tr>
              </tbody>
            </table>
						<hr>
						<h1>訂購資訊</h1><!-- 訂購資訊 訂購資訊 訂購資訊 訂購資訊 訂購資訊 訂購資訊 訂購資訊 訂購資訊 -->
						<div id="OrderForm">
							<div class="col-md-12">
		            <form class="form-horizontal" role="form" action="order_success_insert.php" method="post" data-toggle="validator">
		              <div class="form-group">
		                <div class="col-sm-2">
		                  <label for="OrderName" class="control-label">訂購人</label>
		                </div>
		                <div class="col-sm-10">
											<label for="OrderName"><?php  echo $member['name']; ?></label>
		                </div>
		              </div>
									<div class="form-group">
		                <div class="col-sm-2">
		                  <label for="name" class="control-label">收件者*</label>
		                </div>
		                <div class="col-sm-10">
		                  <input type="text" class="form-control" id="name" name="name" value="<?php  echo $member['name']; ?>" data-error="請輸入收件者。" required>
											<div class="help-block with-errors"></div>
		                </div>
		              </div>
									<div class="form-group">
		                <div class="col-sm-2">
		                  <label for="phone" class="control-label">聯絡電話(選填)</label>
		                </div>
		                <div class="col-sm-10">
		                  <input type="text" class="form-control" id="phone" name="phone" value="<?php  echo $member['phone']; ?>">
		                </div>
		              </div>
		              <div class="form-group">
		                <div class="col-sm-2">
		                  <label for="mobilephone" class="control-label">行動電話*</label>
		                </div>
		                <div class="col-sm-10">
		                  <input type="text" class="form-control" id="mobilephone" name="mobilephone" value="<?php  echo $member['mobilephone']; ?>" required>
											<input type="hidden" name="orderNO" value="<?php  echo "QI".date('ymdHis'); ?>">
											<input type="hidden" name="orderDate" value="<?php  echo date('y-m-d H:i:s'); ?>">
											<input type="hidden" name="memberID" value="<?php  echo $member['memberID']; ?>">
											<input type="hidden" name="totalPrice" value="<?php  echo $totalprice; ?>">
											<input type="hidden" name="shipping" value="<?php  echo $shipping; ?>">
											<input type="hidden" name="createdDate" value="<?php  echo date('y-m-d H:i:s'); ?>">
		                </div>
		              </div>
									<div class="form-group">
		                <div class="col-sm-2">
		                  <label for="email" class="control-label">E-mail*</label>
		                </div>
		                <div class="col-sm-10">
		                  <input type="email" class="form-control" id="email" name="email" value="<?php  echo $member['email']; ?>" data-error="請輸入電子信箱。" required>
											<div class="help-block with-errors"></div>
		                </div>
		              </div>
		              <div class="form-group">
		                <div class="col-sm-2">
		                  <label for="address" class="control-label">寄送地址*</label>
		                </div>
		                <div class="col-sm-10">
		                  <input type="text" class="form-control" id="address" name="address" value="<?php  echo $member['address']; ?>" data-error="請輸入地址。" required>
											<div class="help-block with-errors"></div>
		                </div>
		              </div>
		              <div class="form-group">
		                <div class="col-sm-10 col-sm-offset-2 text-right">
				              <input type="hidden" class="form-control" name="MM_insert" value="INSERT">
		                  <button type="submit" class="edit-button cart">確定結帳</button>
		                </div>
		              </div>
		            </form>
		          </div>
						</div>
				</div>

			</div>
		</div>
		<?php require_once("../template/footer.php"); ?>
	</div>
</body>
</html>
