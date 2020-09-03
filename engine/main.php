<?php
include '../config/config.php';

$year = date('Y', mktime());
$title = 'eShop';

try{
	$connect_str = DB_DRIVER.':host='.DB_HOST.';dbname='.DB_NAME;
	$db = new PDO($connect_str,DB_USER,DB_PASS);
}
catch(PDOException $e){
	die('Error: '.$e->getMessage());
}
