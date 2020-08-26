<?php

include 'digitalGoods.php';

class WeightGoods extends DigitalGoods{
  private $weight;

  public function getWeight(){
    return $this->weight;
  }

  function __construct($name,$category,$price,$percent,$weight){
    parent::__construct($name,$category,$price,$percent);
    $this->weight = $weight;
  }

  function getPrice(){
    return parent::getPrice() / (1000 / $this->weight);
  }

  function getProduct(){
    echo 'Масса: '.$this->weight.'г.<br>Стоимость за 1кг.: '.parent::getPrice().'&#8381<br>';
    parent::getProduct();
  }
 }