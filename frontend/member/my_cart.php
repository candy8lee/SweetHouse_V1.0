<?php session_start();
if(isset($_POST['MM_update']) && $_POST['MM_update'] == "QuantityEdit"){
	$id= $_POST['CartID'];
}
?>
<!doctype html>
<!-- Website ../template by freewebsite../templates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cake House-我的購物車</title>
	<?php require_once("../../template/files2.php"); ?>
</head>
<body>
	<div id="page">
		<?php require_once("../../template/header.php"); ?>
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
					<h1>我的購物車</h1>

						<table id="order-tables">
            	<thead>
            		<tr>
            			<th width="15%">商品圖片</th>
            			<th width="30%">商品名稱</th>
									<th width="10%" class="price">單價</th>
            			<th width="10%" class="quantity">數量</th>
            			<th width="10%" class="subtotal">小計</th>
                  <th width="8%">更新</th>
                  <th width="8%">刪除</th>
            		</tr>
            	</thead>
              <tbody>

	                <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
										<td data-title="商品圖片">
												<a href=""><img src="../uploads/product/cheese.jpg" alt="" width="200" height="150"></a>
										</td>
										<td class="cart_description" data-title="商品名稱">
												<h4><a href="">起司蛋糕</a></h4>
										</td>
	                  <td data-title="單價">$NT 120</td>
	                  <td class="quantity" data-title="數量">1</td>
										<td data-title="小計">$NT 120</td>
	                  <td data-title="更新">
											<a href="#" class="btn btn-default update" style=""><i class="fa fa-upload"></i></a>
										</td>
										<td data-title="刪除">
											<a class="btn btn-default" href="#" ><i class="fa fa-times"></i></a>
										</td>
	                </tr>

									<tr>
										<td colspan="7">
											目前購物車無商品，請<a href="#">前往賣場</a>選購商品。
										</td>
									</tr>

              </tbody>
            </table>
				</div>

			</div>
		</div>
		<?php require_once("../../template/footer.php"); ?>
	</div>
</body>
</html>
