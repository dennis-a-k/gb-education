<?php
include 'main.php';
 
$articles = array(); // массив для результата выборки записей
 
// простая проверка переменной
if (isset($_POST['start']) && is_numeric($_POST['start'])){
 
    $start = $_POST['start']; // точка старта выборки
 
    // получаем 5 записей начиная с точки старта
    
    $res = $db->query("SELECT * FROM `goods` ORDER BY `id` DESC LIMIT {$start}, 5");
    while ($row = $res->fetchObject()){
        $articles[] = $row;
    }
}
// Превращаем массив статей в json-строку для передачи через Ajax-запрос
echo json_encode($articles);