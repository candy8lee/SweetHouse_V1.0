
<!doctype html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>product - Cake House</title>
	<?php require_once("template/files.php"); ?>
</head>
<body>
	<div id="page">
		<?php require_once("template/header.php"); ?>
		<div id="body">

			<div class="header">
				<div>
					<h1>Products</h1>
				</div>
			</div>
			<div class="wrapper">
				<ol class="breadcrumb">
				  <li><a href="../index.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
				  <li class="active"><a href="#">蛋糕</a></li>
				</ol>
				<ul class="Category">

					<li><a href="product_category.php">產品分類</a></li>
					<?php } ?>
				</ul>
				<ul id="Products">

					<li>
						<a href="product_content.php"><img src="../uploads/product/cheese.jpg" width="200" height="150" alt=""></a>
						<a href="product_content.php"><h2>起司蛋糕</h2></a>
					</li>

				</ul>
			</div>
		</div>
		<?php require_once("template/footer.php"); ?>
	</div>
</body>
</html>
