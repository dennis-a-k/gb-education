<?php

class IndexController extends Controller
{
    public $view = 'index';
	
	//метод, который отправляет в представление информацию в виде переменной content_data
	function index($data){
		if(isset($_GET['limit'])){
			$limit = $_GET['limit'];
			var_dump($limit);
		} else {
			$limit = 5;
		}
		
		$goods = db::getInstance()->Select("SELECT * FROM goods ORDER BY id DESC LIMIT $limit");
    return $goods;
	}
}