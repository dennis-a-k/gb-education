<?php

include 'weightGoods.php';

$product1 = new PieceGoods('Свитер', 'Штучный товар', 3500, 25);
$product2 = new DigitalGoods('Фитнес браслет', 'Цифровой товар', $product1->getPrice() / 2, 10);
$product3 = new WeightGoods('Шоколад', 'Весовой товар', 150, 30, 450);

$products = [$product1,$product2,$product3];
foreach ($products as $product) {
  $product->getProduct();
}