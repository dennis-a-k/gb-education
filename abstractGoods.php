<?php

abstract class AbstractProduct {
  private $name;
  private $category;

  public function getName(){
    return $this->name;
  }
  public function getCategory(){
    return $this->category;
  }

  function __construct($name,$category){
    $this->name = $name;
    $this->category = $category;
  }

  abstract function getPrice();
  abstract function salesRevenue();

  function getProduct(){
    echo 'Товар: '.$this->name.'<br>Категория товара: '.$this->category.'<br>';
    echo 'Цена: '.$this->getPrice().'&#8381<br>Доход с продажи: '.$this->salesRevenue().'&#8381<br><hr>';
  }
}