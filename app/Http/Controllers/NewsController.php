<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function about(){
        return view('about');
    }
    public function news(){
        return view('news');
    }
    public function newsCart($id){
        return view('newsCart', ['id' => $id]);
    }
    public function category($category){
        return view('category', ['category' => $category]);
    }
    public function login(){
        return view('login');
    }
}
