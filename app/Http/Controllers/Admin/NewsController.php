<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;

class NewsController extends Controller
{
    public function index(){
        $news = News::query()
            ->latest()
            ->paginate(4);
        return view('admin.news', ['news' => $news]);
    }
    public function newsCartAdmin($id){
        $news = News::find($id);
        return view('admin.newsCart', ['id' => $id, 'news' => $news]);
    }
    public function create(){
        return view('admin.create');
    }
    public function submit(NewsRequest $request){
        $news = new News();
        $news->fill($request->all());
        $news->save();
        return redirect()->route('admin::news')->with('success', 'Новость добавлена');
    }
    public function update($id){
        $news = News::find($id);
        return view('admin.update', ['news' => $news]);
    }
    public function updateSubmit($id, NewsRequest $request){
        $news = News::find($id);
        $news->fill($request->all());
        $news->save();
        return redirect()->route('admim::news-cart', ['id' => $id])->with('success', 'Данные сохранены');
    }
    public function newsDelete($id){
        News::find($id)->delete();
        return redirect()->route('admin::news');
    }
}
