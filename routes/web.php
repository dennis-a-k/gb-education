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

Route::get('/', [NewsController::class, 'index']);
Route::get('/about', [NewsController::class, 'about']);
Route::get('/news', [NewsController::class, 'news']);
Route::get('/news/{id}', [NewsController::class, 'newsCart'])
    ->where('id','[0-9]+');
Route::get('/login', [NewsController::class, 'login']);
Route::get('/{category}', [NewsController::class, 'category']);

/**
 * Админка новостей
 */
Route::group([
    'prefix' => '/admin',
    'namespace' => '\App\Http\Controllers\Admin'
], function(){
    Route::get('/news', 'NewsController@index');
    Route::get('/news/{id}', 'NewsController@newsCartAdmin')
        ->where('id','[0-9]+');
    Route::get('/update/{id}', 'NewsController@update')
        ->where('id','[0-9]+');
    Route::get('/create', 'NewsController@create');
});