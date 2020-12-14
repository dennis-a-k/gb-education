<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        return view('newsAdmin');
    }
    public function create(){
        return view('create');
    }
    public function update($id){
        return view('update');
    }
    public function newsCartAdmin($id){
        return view('newsCartAdmin', ['id' => $id]);
    }
}
