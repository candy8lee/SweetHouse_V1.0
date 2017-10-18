
<!doctype html>
<!-- Website ../template by freewebsite../templates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cake House-我的訂單</title>
	<?php require_once("../template/files2.php"); ?>
</head>
<body>
	<div id="page">
		<?php require_once("../template/header.php"); ?>
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
					<h1>我的訂單</h1>
					<table id="order-tables">
                      	<thead>
                      		<tr>
                      			<th width="15%">訂購日期</th>
                      			<th width="40%">訂單編號</th>
                            <th width="10%">總金額</th>
                            <th width="10%">運費</th>
                      			<th width="15%">訂單狀態</th>
                            <th width="10%" style="border-right:1px solid #ebebeb;"></th>
                      		</tr>
                      	</thead>
                        <tbody>

                          <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
                            <td data-title="訂購日期">2017-05-31</td>
                            <td data-title="訂單編號">SW8994532</td>
                            <td data-title="總金額">$NT 1200</td>
                            <td data-title="運費">$NT 120</td>
                            <td data-title="訂單狀態">待付款
                            </td>
                            <td data-title="觀看明細" style="border-right:1px solid #ebebeb;"><a href="order_details.php">觀看明細</a></td>
                          </tr>
													<tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
                            <td data-title="訂購日期">2017-05-25</td>
                            <td data-title="訂單編號">SW8994532</td>
                            <td data-title="總金額">$NT 1500</td>
                            <td data-title="運費">$NT 120</td>
                            <td data-title="訂單狀態">已付款
                            </td>
                            <td data-title="觀看明細" style="border-right:1px solid #ebebeb;"><a href="order_details.php">觀看明細</a></td>
                          </tr>
                        </tbody>
                      </table>

				</div>

			</div>
		</div>
		<?php require_once("../template/footer.php"); ?>
	</div>
</body>
</html>
