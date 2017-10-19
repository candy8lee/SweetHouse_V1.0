<?php
require_once("../connection/database.php");
$sql = "SELECT * FROM product_category";
$sth = $db->query($sql);
$category = $sth->fetchALL(PDO::FETCH_ASSOC);


$sth = $db->query("SELECT * FROM product WHERE productID=".$_GET['productID']." AND categoryID =".$_GET['cateID']);
$product = $sth->fetch(PDO::FETCH_ASSOC);
 ?>
<!doctype html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>product - Cake House</title>
	<?php require_once("template/files.php"); ?>
	<link rel="stylesheet" href="../assets/css/cart.css">
</head>
<body>
	<div id="page">
		<?php require_once("template/header.php"); ?>
		<div id="body">
			<div class="header">
				<div>
					<h1>產品介紹</h1>
				</div>
			</div>
			<div class="wrapper">
				<ol class="breadcrumb">
				  <li><a href="../index.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
				  <li><a href="#">蛋糕</a></li>
				  <li class="active"><?php echo $product['name']; ?></li>
				</ol>
			<ul class="Category">
				<li><a href="product_no_category.php">全部商品</a></li>
				<?php foreach($category as $row){ ?>
				<li><a href="product_category.php?cateID=<?php echo $row['categoryID'];?>"><?php echo $row['category']; ?></a></li>
				<?php } ?>
			</ul>
				<div id="Product">

					<div class="content-left">
						<img src="../uploads/products/<?php echo $product['picture']; ?>" alt="">
					</div>
					<div class="content-right">
						<h2><?php echo $product['name']; ?></h2>
						<form class="" action="add_cart.php" method="post">
							<table id="ProductTable">
								<tr>
									<td width="20%">價格：</td>
									<td class="price"><?php echo $product['price']; ?></td>
								</tr>
								<tr>
									<td>數量：</td>
									<td>
										<div class="quantity-button">
											<i class="fa fa-minus" aria-hidden="true"></i>
										</div>
										<input type="text" name="Quantity" value="1">
										<div class="quantity-button">
											<i class="fa fa-plus" aria-hidden="true"></i>
										</div>
									</td>
								</tr>
								<tr>
									<td colspan="2"><input type="submit" class="cart" value="加入購物車"></td>
								</tr>
							</table>
						</form>
					</div>
					<div class="clearboth"></div>
					<hr>
					<h3>商品詳情</h3>
					<p><?php echo $product['decription']; ?></p>
				</div>
			</div>
		</div>
		<?php require_once("template/footer.php"); ?>
	</div>
</body>
</html>
