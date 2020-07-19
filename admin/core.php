<?php

$action = $_POST['action'];


require "function.php";



switch ($action) {
    case 'init':
        init($connect);
        break;
    case 'selectOneGoods':
        selectOneGoods($connect);
        break;
    case 'updateGoods':
        updateGoods($connect);
        writeJSON($connect);
        break;
    case 'newGoods':
        newGoods($connect);
        writeJSON($connect);
        break;
    case 'loadGoods':
        loadGoods($connect);
        writeJSON($connect);
        break;

}

