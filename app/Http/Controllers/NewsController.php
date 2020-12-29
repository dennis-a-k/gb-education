<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        return view('index');
    }
    public function about(){
        return view('news.about'); //Папка news -> шаблон about
    }
    public function news(){
        return view('news.news');
    }
    public function newsCart($id){
        return view('news.newsCart', ['id' => $id]);
    }
    public function category($category){
        return view('news.category', ['category' => $category]);
    }
    public function login(){
        return view('news.login');
    }
}
