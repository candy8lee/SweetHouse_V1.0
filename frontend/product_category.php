<?php
require_once("../connection/database.php");
$sql = "SELECT * FROM product_category";
$sth = $db->query($sql);
$category = $sth->fetchALL(PDO::FETCH_ASSOC);

$sth = $db->query("SELECT * FROM product WHERE categoryID=".$_GET['cateID']." ORDER BY createdDate DESC");
$products = $sth->fetchALL(PDO::FETCH_ASSOC);

//麵包屑裡的分類名稱-連結
$sth = $db->query("SELECT * FROM product_category WHERE categoryID=".$_GET['cateID']);
$category_name = $sth->fetch(PDO::FETCH_ASSOC);
 ?>
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
				  <li class="active"><a href="product_no_category.php">全部商品</a></li>
          <li class="active"><a href="product_category.php?cateID=<?php echo $category_name['categoryID']; ?>"><?php echo $category_name['category']; ?></a></li>
				</ol>
				<ul class="Category">
					<li><a href="product_no_category.php">全部商品</a></li>
					<?php foreach($category as $row){ ?>
					<li><a href="product_category.php?cateID=<?php echo $row['categoryID'];?>"><?php echo $row['category']; ?></a></li>
					<?php } ?>
				</ul>
        <div class="row">
            <div class="col-md-4">
            </div><div class="col-md-4">
            </div>
            <div class="col-md-4">
                <form action="search_result.php" class="" method="get">
                    <div class="form-group has-feedback">
                		<label for="search" class="sr-only">搜尋產品</label>
                		<input type="text" class="form-control" name="search" id="search" placeholder="搜尋產品">
                    <input type="hidden" name="cateID" value="<?php echo $products[0]['categoryID'];?>">
                  		<span class="glyphicon glyphicon-search form-control-feedback"></span>
                	</div>
                </form>
            </div>
        </div>
				<ul id="Products">
					<?php foreach($products as $row){ ?>
					<li>
						<a href="product_content.php?cateID=<?php echo $row['categoryID'];?>&&productID=<?php echo $row['productID']; ?>"><img src="../uploads/products/<?php echo $row['picture']; ?>" width="200" height="150" alt=""></a>
						<a href="product_content.php?cateID=<?php echo $row['categoryID'];?>&&productID=<?php echo $row['productID']; ?>"><h2><?php echo $row['name']; ?></h2></a>
					</li>
				<?php } ?>
				</ul>
			</div>
		</div>
		<?php require_once("template/footer.php"); ?>
	</div>
</body>
</html>
