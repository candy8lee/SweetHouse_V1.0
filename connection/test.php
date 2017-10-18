<?php

require_once("database.php");


$sql = "SELECT * FROM `news` WHERE `newsID`< 10 OR `newsID`>20 ";
$sth = $db->query($sql);
$all_news = $sth->fetchALL(PDO::FETCH_ASSOC);
print_r($all_news);
for ($i=0; $i < count($all_news); $i++) {
    echo "<br>標題： ".$all_news[$i]['title'];
    echo ", createdDate : ".$all_news[$i]['createdDate'];
    echo ", publishedDate : ".$all_news[$i]['publishedDate']."<br>";
}
 ?>
