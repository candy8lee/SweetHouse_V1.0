
<!doctype html>
<!-- Website ../template by freewebsite../templates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cake House-會員資料修改</title>
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
				<div id="MemberForm">
					<h1>會員資料修改</h1>
					<form action="member_edit.php" method="post">
						<input type="hidden" name="MM_update" value="EditForm">

						<table>
								<tr>
									<th>帳號：</th>
									<td>andy@gmail.com</td>
								</tr>
								<tr>
									<th>姓名：</th>
									<td>
										<input type="text" name="Name" value="Andy">
										<div class="help-block with-errors"></div>
									</td>
								</tr>
								<tr>
									<th>性別：</th>
									<td>
										<input type="radio" name="Gender" value="0" checked="true"> 男
										<input type="radio" name="Gender" value="1" > 女
									</td>
								</tr>
								<tr>
									<th>生日：</th>
									<td><input type="text" name="Birthday" value="<?php echo $member['Birthday']; ?>"></td>
								</tr>
								<tr>
									<th>聯絡電話：</th>
									<td><input type="text" name="Phone"></td>
								</tr>
								<tr>
									<th>行動電話：</th>
									<td><input type="text" name="MobilePhone"></td>
								</tr>
								<tr>
									<th>地址：</th>
									<td><input type="text" name="Address"></td>
								</tr>
								<tr>
									<td colspan="2" align="center"><input type="submit" value="更新資料" id="submit" ></td>
								</tr>
						</table>
					</form>

				</div>

			</div>
		</div>
		<?php require_once("../../template/footer.php"); ?>
	</div>
</body>
</html>
