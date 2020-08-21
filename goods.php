<?php

class Goods
{
  private $name;
  private $price;

  function __construct($name, $price){
    $this->name = $name;
    $this->price = $price;
  }

  public function getName(){
    return $this->name;
  }
  public function getPrice(){
    return $this->price;
  }

  function getProduct(){
    echo 'Товар: '.$this->name.'<br>Цена: '.$this->price.'&#8381<br>';
  }
}