<?php

include 'abstractGoods.php';

class PieceGoods extends AbstractProduct{
  private $price;
  private $percent;

  public function getPrice(){
    return $this->price;
  }

  public function getPercent(){
    return $this->percent;
  }

  function __construct($name,$category,$price,$percent){
    parent::__construct($name,$category);
    $this->price = $price;
    $this->percent = $percent;
  }

  function salesRevenue(){
    return $this->getPrice() * ($this->getPercent() / 100);
  }
}