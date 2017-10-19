<?php
require_once("../connection/database.php");

$limit = 5;//news item 筆數限制
if (isset($_GET["page"])) { $page_num  = $_GET["page"]; } else { $page_num=1; };//判斷網址上有沒有頁碼、沒有就預設第一頁
$start_from = ($page_num-1) * $limit;//news item 從第幾筆開始//ex:(第二頁-1)*limit->[5]開始數五個出來//[0]開始
$sql = "SELECT * FROM news ORDER BY publishedDate DESC LIMIT ".$start_from.",".$limit;// LIMIT num,num
$sth = $db->query($sql);
$all_news = $sth->fetchALL(PDO::FETCH_ASSOC);

$totalRows = count($all_news);

//最新消息
$sth2 = $db->query("SELECT * FROM news ORDER BY publishedDate DESC");
$last_news = $sth2->fetch(PDO::FETCH_ASSOC);
 ?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>News - Cake House</title>
	<?php require_once("template/files.php"); ?>
</head>
<body>
	<div id="page">
		<?php require_once("template/header.php"); ?>
		<div id="body">
			<div class="header">
				<div>
					<h1>News</h1>
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
          <?php
            if($totalRows > 0){
              $sth = $db->query("SELECT * FROM news ORDER BY publishedDate DESC");
              $data_count = count($sth->fetchAll(PDO::FETCH_ASSOC));
              $totalpages = ceil($data_count / $limit );//四捨五入
          ?>
          <ul class="pagination ">
            <?php include_once("template/page_num.php"); ?>
          </ul>
          <?php }//if totalRows > 0 ?>
				</div>
				<div class="sidebar">
					<h1>最新消息</h1>
					<h2><?php echo $last_news['title']; ?></h2>
					<span><?php echo $last_news['publishedDate']; ?></span>
					<p><?php echo mb_substr( $last_news['content'],0,50,"utf-8")."......"; ?></p>
					<a href="news.php?newsID=<?php echo $last_news['newsID'];?>" class="more">Read More</a>
				</div>
			</div>
		</div>
		<?php require_once("template/footer.php"); ?>
	</div>
</body>
</html>
