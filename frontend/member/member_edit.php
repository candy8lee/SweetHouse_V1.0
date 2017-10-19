<?php
session_start();
require_once('../../connection/database.php');
if(isset($_POST['MM_update']) && $_POST['MM_update'] == 'UPDATE'){

	//上傳頭像
	if(isset($_FILES['picture']['name']) && $_FILES['picture']['name'] != null){
    if (!file_exists('../../uploads/member_pic')) mkdir('../../uploads/member_pic', 0755, true);
    $fileTYPE = strrchr($_FILES['picture']['name'],".");//查找字串，遇到"."停止->分割副檔名
    //$filename = rand().$fileTYPE;//亂數連接副檔名->rename
    $filename = md5($_FILES['picture']['name']).$fileTYPE;
    move_uploaded_file($_FILES['picture']['tmp_name'],"../../uploads/member_pic/".$filename);   // 搬移上傳檔案
  }else{
    $filename = $_POST['picture1'];
  }


  $sql= "UPDATE member SET
                        picture= :picture,
                        name= :name,
                        phone= :phone,
                        email= :email,
                        address= :address,
                        updatedDate= :updatedDate
                        WHERE memberID= :memberID";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":picture", $filename, PDO::PARAM_STR);
  $sth ->bindParam(":name", $_POST['name'], PDO::PARAM_STR);
  $sth ->bindParam(":phone", $_POST['phone'], PDO::PARAM_STR);
  $sth ->bindParam(":email", $_POST['email'], PDO::PARAM_STR);
  $sth ->bindParam(":address", $_POST['address'], PDO::PARAM_STR);
  $sth ->bindParam(":updatedDate", $_POST['updatedDate'], PDO::PARAM_STR);
  $sth ->bindParam(":memberID", $_POST['memberID'], PDO::PARAM_INT);
  $sth -> execute();

  header('Location: member_edit.php');
}
$sth = $db->query("SELECT * FROM member WHERE account = $_SESSION['account']");
$member = $sth->fetch(PDO::FETCH_ASSOC);
 ?>
<!doctype html>
<!-- Website ../template by freewebsite../templates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cake House-會員資料修改</title>
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
				<ul class="Category">
					<li><a href="member_edit.php">會員資料修改</a></li>
					<li><a href="my_cart.php">我的購物車</a></li>
					<li><a href="my_orders.php">我的訂單</a></li>
				</ul>
				<div id="MemberForm">
					<h1>會員資料修改</h1>
					<form action="member_edit.php" method="post">
						<input type="hidden" name="MM_update" value="UPDATE">
						<input type="hidden" name="updatedDate" value="<?php echo date("Y-m-d H:i:s"); ?>">
						<input type="hidden" name="memberID" value="<?php echo $member['memberID']; ?>">
						<table>
								<tr>
									<input type="file" class="form-control" id="picture" name="picture">
									<input type="hidden" name="picture1" value="<?php echo $member['picture']; ?>"><!--預防沒選圖片送出空資料-->
								</tr>
								<tr>
									<th>頭像：</th>
									<td><img src="../../uploads/member_pic/<?php echo $member['picture']; ?>" alt=""></td>
								</tr>
								<tr>
									<th>帳號：</th>
									<td><?php echo $member['account']; ?></td>
								</tr>
								<tr>
									<th>姓名：</th>
									<td>
										<input type="text" name="name" value="<?php echo $member['name']; ?>">
										<div class="help-block with-errors"></div>
									</td>
								</tr>
								<tr>
									<th>聯絡電話：</th>
									<td><input type="text" name="phone" value="<?php echo $member['phone']; ?>"></td>
								</tr>
								<tr>
									<th>聯絡Email：</th>
									<td><input type="text" name="email" value="<?php echo $member['email']; ?>"></td>
								</tr>
								<tr>
									<th>地址：</th>
									<td><input type="text" name="address" value="<?php echo $member['address']; ?>"></td>
								</tr>
								<tr>
									<td colspan="2" align="center"><input type="submit" value="更新資料" id="submit" ></td>
								</tr>
						</table>
					</form>

				</div>

			</div>
		</div>
		<?php require_once("../template/footer.php"); ?>
	</div>
</body>
</html>
