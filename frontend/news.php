<?php
require_once("../connection/database.php");

$sql = "SELECT * FROM news WHERE newsID =".$_GET['newsID'];
$sth = $db->query($sql);
$news = $sth->fetch(PDO::FETCH_ASSOC);
 ?>

<!doctype html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>singlepost - Cake House</title>
	<?php require_once("template/files.php"); ?>
</head>
<body>
	<div id="page">
		<?php require_once("template/header.php"); ?>
		<div id="body">
			<div class="header">
				<div>
					<h1>Single Post</h1>
				</div>
			</div>
			<div class="singlepost">
				<div class="featured">
					<h1><?php echo $news['title']; ?></h1>
					<span><?php echo $news['publishedDate']; ?></span>
					<p><?php echo $news['content']; ?></p>
					<a href="news_list.php" class="load">back to blog</a>
				</div>
				<div class="sidebar">
					<h1>Recent Posts</h1>
					<img src="../images/on-diet.png" alt="">
					<h2>ON THE DIET</h2>
					<span>By Admin on November 28, 2023</span>
					<p>You can replace all this text with your own text. You can remove any link to our website from this website template.</p>
					<a href="news.php" class="more">Read More</a>
				</div>
			</div>
		</div>
		<?php require_once("template/footer.php"); ?>
	</div>
</body>
</html>
