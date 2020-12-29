<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        return view('admin.newsAdmin');
    }
    public function create(){
        return view('admin.create');
    }
    public function submit(Request $request){
        dd($request->all(['title', 'content', 'category']));
    }
    public function update($id){
        return view('admin.update', ['id' => $id]);
    }
    public function newsCartAdmin($id){
        return view('admin.newsCartAdmin', ['id' => $id]);
    }
}
