<?php
require_once("../connection/database.php");

$sql = "SELECT * FROM news ORDER BY publishedDate DESC";
$sth = $db->query($sql);
$all_news = $sth->fetchALL(PDO::FETCH_ASSOC);
$totalRows = count($all_news);
 ?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>blog - Cake House</title>
	<?php require_once("template/files.php"); ?>
</head>
<body>
	<div id="page">
		<?php require_once("template/header.php"); ?>
		<div id="body">
			<div class="header">
				<div>
					<h1>Blog</h1>
				</div>
			</div>
			<div class="blog">
				<div class="featured">
					<ul>
						<?php foreach($all_news as $row){ ?>
						<li>
							<div>
								<h1><?php echo $row['title']; ?></h1>
								<span><?php echo $row['publishedDate']; ?></span>
								<p><?php echo mb_substr( $row['content'],0,50,"utf-8")."......"; ?></p>
								<a href="news.php?newsID=<?php echo $row['newsID']; ?>" class="more">Read More</a>
							</div>
						</li>
						<?php } ?>
					</ul>
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
