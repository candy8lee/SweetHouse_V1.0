<?php
require_once("../connection/database.php");
$sth = $db->query("SELECT * FROM page WHERE pageID = 1");
$page = $sth->fetch(PDO::FETCH_ASSOC);
 ?>﻿
<!doctype html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>about - Sweet House</title>
	<?php include("template/files.php"); ?>
</head>
<body>
	<div id="page">
		<?php include("template/header.php"); ?>
		<div id="body">
			<div class="header">
				<div>
					<h1>品牌介紹</h1>
				</div>
			</div>
			<div class="body">
				<img src="../images/bg-header-about.jpg" alt="">
			</div>
			<div class="footer">
				<div class="sidebar">

					<p>
						<?php echo $page['title']; ?>
					</p>
								</div>
				<div class="article">
						<?php echo $page['content']; ?>
				</div>
			</div>
		</div>
		<?php include("template/footer.php"); ?>
	</div>
</body>
</html>
