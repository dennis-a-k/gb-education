<?php 
  if(isset($_GET['id'])){
    $id = (int)($_GET[id]);
  }
  include '../engine/main.php';
  $good = getGoods($connect, $id);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../public/styles/style.css">
  <title>eShop</title>
</head>
<body>
  <header>
    <div class="cart">
      <a href="#" class="cart-button _margin" type="button">Корзина</a>
      <div class="cart-block"></div>
    </div>
    <a href="index.php" class="logo">eShop</a>
  </header>
  <div class="good-list _margin">
    <img src="../public/img/<?= $good['img_2']?>">
    <div class="">
      <h3 class="heading"><?= $good['title']?></h3>
      <p class="price"><?= $good['price']?> ₽</p>
      <p class="text-right description _margin-top"><?= $good['description']?></p>
      <a href="#" class="cart-button _margin-top">Купить</a>
    </div>
  </div>
</body>
</html>