<?php
//資料庫變數
$db_type = 'mysql';//使用那一種資料庫
$db_host = 'localhost';//主機位置
$db_name = 'tformers';//資料庫名稱
$db_user = 'qi';//使用者
$db_password= '123456';//密碼

// 資料庫連線
try {
    $db = new PDO($db_type . ':host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    // 資料庫使用 UTF8 編碼
    //echo "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~";
} catch (PDOException $e) {
    echo 'Error!: ' . $e->getMessage() . '<br />';
}
date_default_timezone_set("Asia/Taipei");//設定時區
?>
