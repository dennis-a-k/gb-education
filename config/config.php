<?php
const SERVER = 'localhost';
const DB = 'gb_lesson_php-1';
const LOGIN = 'root';
const PASS = 'root';

$connect = mysqli_connect(SERVER,LOGIN,PASS,DB) or die('Ошибка соединенеия!');
?>