<?php

const PATH_BIG = "images/big/";
const PATH_SMALL = "images/small/";


const SERVER = "localhost";
const DB = "gb_lesson_php-1";
const LOGIN = "root";
const PASS = "root";


$connect = mysqli_connect(SERVER,LOGIN,PASS,DB) or die("Ошибка соединения с базой данных!");

mysqli_query($connect, "SET NAMES utf8");



function init($connect) {
    // вывод списка товаров в админке

    $sql = "SELECT id, title FROM goods";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        $out = [];
        while($row = mysqli_fetch_assoc($result)) {
            $out[$row['id']] = $row;
        }
        echo json_encode($out);
    } else {
        echo "0";
    }

    mysqli_close($connect);
}

function selectOneGoods($connect) {
    $id = $_POST['good-id'];
    $sql = "SELECT * FROM goods WHERE id = '$id'";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    } else {
        echo "0";
    }

    mysqli_close($connect);
}

function updateGoods($connect) {
    $id = $_POST['id'];
    $title = $_POST['good-name'];
    $price = $_POST['good-price'];
    $full_info = $_POST['good-desc'];
    $img = $_POST['good-img'];

    $sql = "UPDATE goods SET title = '$title', price = '$price', full_info = '$full_info', img = '$img' WHERE id = '$id'";

    if (mysqli_query($connect, $sql)) {
        echo "1";
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }



}

function newGoods($connect) {

    $title = $_POST['good-name'];
    $price = $_POST['good-price'];
    $full_info = $_POST['good-desc'];
    $img = $_POST['good-img'];

    $sql = "INSERT INTO goods (title, price, full_info, img)
VALUES ('$title', '$price', '$full_info', '$img')";

    if (mysqli_query($connect, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }

}

function writeJSON($connect) {
    $sql = "SELECT * FROM goods";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        $out = [];
        while($row = mysqli_fetch_assoc($result)) {
            $out[$row["id"]] = $row;
        }
        file_put_contents('../goods.json', json_encode($out));
    } else {
        echo "0";
    }

    mysqli_close($connect);

}

function loadGoods($connect) {
    $sql = "SELECT * FROM goods";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        $out = [];
        while($row = mysqli_fetch_assoc($result)) {
            $out[] = $row;
        }
        echo json_encode($out);
    } else {
        echo "0";
    }

}