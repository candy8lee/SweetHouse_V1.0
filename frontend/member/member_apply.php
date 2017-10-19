<?php
require_once('../../connection/database.php');
if(isset($_POST['MM_insert']) && $_POST['MM_insert'] == 'INSERT'){
	$sql= "INSERT INTO member( account, password, phone, createdDate, email)
                    VALUES ( :account, :password, :phone, :createdDate, :email)";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":account", $_POST['account'], PDO::PARAM_STR);
  $sth ->bindParam(":password", $_POST['password'], PDO::PARAM_STR);
  $sth ->bindParam(":phone", $_POST['phone'], PDO::PARAM_STR);
	$sth ->bindParam(":createdDate", $_POST['createdDate'], PDO::PARAM_STR);
  $sth ->bindParam(":email", $_POST['email'], PDO::PARAM_STR);
  $sth -> execute();

  header('Location: apply_success.php');
}

 ?>
<!doctype html>
<!-- Website ../template by freewebsite../templates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cake House-會員申請</title>
	<?php require_once("../template/files2.php"); ?>
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
				<div id="MemberForm">
					<h1>加入會員</h1>
					<div class="row">
	          <div class="col-md-12">
					<form action="member_apply.php" method="post" data-toggle="validator">
						<div class="form-group">
							<div class="col-sm-2">
								<label for="email" class="control-label">Email</label>
							</div>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="email" name="email"  style="margin-bottom:10px;" data-error="請輸入E-mail" required>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-2">
								<label for="account" class="control-label">帳號</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="account" name="account"  style="margin-bottom:10px;" data-error="請輸入帳號" required>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-2">
								<label for="password" class="control-label">密碼</label>
							</div>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="password" name="password" pattern="^(?=^.{8,}$)((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.*$" data-minlength="6" required data-error="密碼長度必須有八碼，並且包含至少一個小寫字母與一個大寫字母和一個數字">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-2">
								<label for="ConfirmPas" class="control-label">確認密碼</label>
							</div>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="ConfirmPas" name="ConfirmPas" data-match="#password" data-match-error="密碼不符，請重新輸入">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-2">
								<label for="phone" class="control-label">聯絡電話</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="phone" name="phone" pattern="^[0-9]*$" data-error="請輸入電話號碼" required>
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12 text-center" style="margin-bottom:10px;">
								<input type="checkbox" id="Agree" data-error="請勾選我同意會員條款" required>
        我同意Cake House <a href="about.php?PageID=3" target="_blank">會員條款</a>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12 text-center">
								<input type="hidden" name="MM_insert" value="INSERT">
								<input type="hidden" class="form-control" id="createdDate" name="createdDate" value="<?php echo date("Y-m-d H:i:s"); ?>">
								<button type="submit" class="btn btn-default" style="width:200px;">確認送出</button>
							</div>
						</div>
					</form>
					<hr>
					<h1>社群登入</h1>
					<form action="apply_success.php" style="width:50%">
						<input class="facebook" type="submit" value="facebook 註冊" id="submit">
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
