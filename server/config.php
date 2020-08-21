<?php
header('Content-Type: text/html; charset=utf-8');


const PATH_BIG = "images/big/";
const PATH_SMALL = "images/small/";


const SERVER = "localhost";
const DB = "gb_lesson_php-1";
const LOGIN = "root";
const PASS = "root";


$connect = mysqli_connect(SERVER,LOGIN,PASS,DB) or die("Ошибка соединения с базой данных!");

mysqli_query($connect, "SET NAMES utf8");

//-----ОТЗЫВЫ------
if($_POST['submit']){
	$name = trim(strip_tags($_POST['name']));
	$text = trim(strip_tags($_POST['text']));

	$t = "INSERT INTO reviews (name, text) VALUES ('%s','%s')";

	$query = sprintf($t, mysqli_real_escape_string($connect, $name),mysqli_real_escape_string($connect, $text));

	$result = mysqli_query($connect, $query);

	header('Location: ../index.php');
}