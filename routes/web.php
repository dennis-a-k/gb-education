<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [NewsController::class, 'index'])
    ->name('index');
Route::get('/about', [NewsController::class, 'about'])
    ->name('about');
Route::get('/news', [NewsController::class, 'news'])
    ->name('news');
Route::get('/news/{id}', [NewsController::class, 'newsCart'])
    ->name('news-cart')
    ->where('id','[0-9]+');
Route::get('/login', [NewsController::class, 'login'])
    ->name('login');
Route::get('/{category}', [NewsController::class, 'category'])
    ->name('category');

/**
 * Админка новостей
 */
Route::group([
    'prefix' => '/admin',
    'namespace' => '\App\Http\Controllers\Admin'
], function(){
    Route::get('/news', 'NewsController@index')
        ->name('admin::news');
    Route::get('/news/{id}', 'NewsController@newsCartAdmin')
        ->name('admim::news-cart')
        ->where('id','[0-9]+');
    Route::get('/update/{id}', 'NewsController@update')
        ->name('update')
        ->where('id','[0-9]+');
    Route::get('/create', 'NewsController@create')
        ->name('create');
    Route::post('/create/submit', 'NewsController@submit')
        ->name('submit');
});