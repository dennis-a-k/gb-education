<?php

include 'goods.php';

class Category extends Goods
{
  private $category;

  function __construct($name, $price, $category){
    parent::__construct($name, $price);
    $this->category = $category;
  }

  function getCategory(){
    echo 'Категория товара: '.$this->category.'<br><hr>';
  }

  function getGoods(){
    parent::getProduct();
    $this->getCategory();
  }
}

$product1 = new Category('Ноутбук', 65000, 'Техника');
$product2 = new Category('Свитер', 3500, 'Одежда');
$product3 = new Category('Кроссовки', 6000, 'Одежда');
$product4 = new Category('Шоколад', 150, 'Продукты питания');
$product5 = new Category('Холодильник', 29000, 'Техника');

$products = [$product1,$product2,$product3,$product4,$product5];
foreach ($products as $product) {
  $product->getGoods();
}