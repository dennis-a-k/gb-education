<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;

class NewsController extends Controller
{
    public function index(){
        $news = News::get();
        return view('admin.newsAdmin', ['news' => $news]);
    }
    public function newsCartAdmin($id){
        $news = News::find($id);
        return view('admin.newsCartAdmin', ['id' => $id, 'news' => $news]);
    }
    public function create(){
        return view('admin.create');
    }
    public function submit(NewsRequest $request){
        $news = new News();
        $news->title = $request->input('title');
        $news->category_id = $request->input('category');
        $news->source_id = $request->input('source');
        $news->content = $request->input('content');
        $news->save();
        return redirect()->route('admin::news');
    }
    public function update($id){
        $news = News::find($id);
        return view('admin.update', ['news' => $news]);
    }
    public function updateSubmit($id, NewsRequest $request){
        $news = News::find($id);
        $news->title = $request->input('title');
        $news->category_id = $request->input('category');
        $news->source_id = $request->input('source');
        $news->content = $request->input('content');
        $news->save();
        return redirect()->route('admim::news-cart', ['id' => $id]);
    }
    public function newsDelete($id){
        News::find($id)->delete();
        return redirect()->route('admin::news');
    }
}
