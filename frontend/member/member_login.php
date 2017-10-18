<!doctype html>
<!-- Website ../template by freewebsite../templates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cake House-會員申請</title>
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
				<div id="MemberForm">
					<h1>會員登入</h1>
					<div class="row">
	          <div class="col-md-12">
					<form action="#" method="post" data-toggle="validator">
						<div class="form-group">
							<div class="col-sm-2">
								<label for="Account" class="control-label">帳號</label>
							</div>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="Account" name="Account"  style="margin-bottom:10px;" data-error="請輸入帳號" required>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-2">
								<label for="Password" class="control-label">密碼</label>
							</div>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="Password" name="Password" data-minlength="6" data-error="請輸入密碼" required>
								<div class="help-block with-errors"></div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-12 text-center">
								<button type="submit" class="btn btn-default" style="width:200px;">登入</button>
								<a href="forget_password.php" style="margin-left:30px;">忘記密碼?</a>
							</div>
						</div>
					</form>
					<hr>
					<h1>社群登入</h1>
					<form action="apply_success.php" style="width:50%">
						<input class="facebook" type="submit" value="facebook 登入" id="submit">
					</form>
					</div>
				</div>
				</div>

			</div>
		</div>
		<?php require_once("../../template/footer.php"); ?>
	</div>
</body>
</html>
