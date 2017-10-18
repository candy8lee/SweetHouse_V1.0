<!doctype html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>contact - Cake House</title>
	<?php require_once("template/files.php"); ?>
</head>
<body>
	<div id="page">
		<?php require_once("template/header.php"); ?>
		<div id="body" class="contact">
			<div class="header">
				<div>
					<h1>Contact</h1>
				</div>
			</div>
			<div class="body">
				<div>
					<div>
						<img src="../images/check-in.png" alt="">
						<h1>UNIT 0123 , ABC BUILDING, BUSSINESS PARK</h1>
						<p>If you're having problems editing this website template, then don't hesitate to ask for help on the Forums.</p>
					</div>
				</div>
			</div>
			<div class="footer">
				<div class="contact">
					<h1>INQUIRY FORM</h1>
					<form action="../index.php">
						<input type="text" name="Name" value="Name" onblur="this.value=!this.value?'Name':this.value;" onfocus="this.select()" onclick="this.value='';">
						<input type="text" name="Email" value="Email" onblur="this.value=!this.value?'Email':this.value;" onfocus="this.select()" onclick="this.value='';">
						<input type="text" name="Subject" value="Subject" onblur="this.value=!this.value?'Subject':this.value;" onfocus="this.select()" onclick="this.value='';">
						<textarea name="meassage" cols="50" rows="7">Share your thoughts</textarea>
						<input type="submit" value="Send" id="submit">
					</form>
				</div>
				<div class="section">
					<h1>WE’D LOVE TO HEAR FROM YOU.</h1>
					<p>If you're having problems editing this website template, then don't hesitate to ask for help on the Forums.</p>
				</div>
			</div>
		</div>
		<?php require_once("template/footer.php"); ?>
	</div>
</body>
</html>
