<!doctype html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cake House-首頁</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/style.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="assets/css/mobile.css">
	<script src="assets/jq-ui/jquery-1.12.1.min.js" type="text/javascript"></script>
	<script src="assets/js/mobile.js" type="text/javascript"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
	<div id="page">
		<div id="tool-bar">
		  <div class="container">
		  <div class="tool"><a href="#">加入會員</a> 。 <a href="#">會員登入</a> 。 <a href="#"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i></a>
		  </div>
		</div>
		</div>
		<div id="header">
		  <div class="container">
		    <a href="index.php" class="logo"><img src="assets/images/logo.png" alt=""></a>

		    <ul id="navigation">
		      <li class="selected">
		        <a href="index.php">首頁</a>
		      </li>
		      <li class="menu">
		        <a href="frontend/about.php?PageID=1">關於我們</a>
		        <ul class="primary">
		          <li>
		            <a href="frontend/about.php?PageID=2">購物須知</a>
		          </li>
		          <li>
		            <a href="frontend/about.php?PageID=3">會員條款</a>
		          </li>
		        </ul>
		      </li>
		      <li>
		        <a href="frontend/product_no_category.php">產品介紹</a>
		      </li>
		      <li class="menu">
		        <a href="frontend/blog.php">最新消息</a>
		      </li>
		      <li>
		        <a href="frontend/contact.php">聯絡我們</a>
		      </li>
		    </ul>
		    <div class="clearboth">	</div>
		    </div>

		</div>

		<div id="body" class="home">
			<div class="header">
				<img src="assets/images/bg-home.jpg" alt="">
				<div>
					<a href="product.php">Freeze Delight</a>
				</div>
			</div>
			<div class="body">
				<div>
					<div>
						<h1>NEW PRODUCT</h1>
						<h2>The Twist of Healthy Yogurt</h2>
						<p>This website template has been designed by freewebsitetemplates.com for you, for free. You can replace all this text with your own text.</p>
					</div>
					<img src="assets/images/yogurt.jpg" alt="">
				</div>
			</div>
			<div class="footer">
				<div>
					<ul>
						<li>
							<a href="product.php" class="product"></a>
							<h1>PRODUCTS</h1>
						</li>
						<li>
							<a href="about.php" class="about"></a>
							<h1>OUR STORY</h1>
						</li>
						<li>
							<a href="product.php" class="flavor"></a>
							<h1>FLAVORS</h1>
						</li>
						<li>
							<a href="contact.php" class="contact"></a>
							<h1>OUR LOCATION</h1>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<?php include("frontend/template/footer.php"); ?>
	</div>
</body>
</html>
