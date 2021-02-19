<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
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
        $categories = Category::get();
        $news = News::query()
            ->latest() // отображение новостей в обратном порядке
            ->paginate(8);
        return view('news.news', ['categories' => $categories, 'news' => $news]);
    }
    public function newsCart($id){
        $news = News::find($id);
        return view('news.newsCart', ['news' => $news]);
    }
    public function category($url){
        $category = Category::query()
            ->where('url', $url)
            ->first();
        return view('news.category', ['category' => $category]);
    }
    public function login(){
        return view('news.login');
    }
}
