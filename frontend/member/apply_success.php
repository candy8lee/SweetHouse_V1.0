<?php

      $to      = "candy8lee@hotmail.com";

  		$header  = 'Content-type: text/html; charset=iso-8859-1'."\r\n";
  		$header .= "From: service@gmail.com";

  		$subject = "[Cake House] 註冊成功";
  		$body    = "請確認帳號<br>";
  		$body   .= "已收到帳號申請內容，如無誤請點選<a>會員登入頁</a>進行登入。";

  		mail($to, $subject, $body, $header);

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
					<h2>申請會員成功!</h2>
          <p>請至信箱查收確認信。</p>
					<p>
						您已成功加入會員，請至 <a href="member_login.php">登入頁</a>，登入您的帳號，方可進行購物。
					</p>
				</div>
			</div>
		</div>
		<?php require_once("../template/footer.php"); ?>
	</div>
</body>
</html>
