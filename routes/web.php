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

/**
 * Админка новостей
 */
Route::group([
    'prefix' => '/admin',
    'namespace' => '\App\Http\Controllers\Admin',
    'middleware' => ['auth', 'check_admin']
], function(){
    Route::get('/news', 'NewsController@index')
        ->name('admin::news');
    Route::get('/news/{id}', 'NewsController@newsCartAdmin')
        ->name('admim::news-cart')
        ->where('id','[0-9]+');
    Route::get('/update/{id}', 'NewsController@update')
        ->name('update')
        ->where('id','[0-9]+');
    Route::post('/update/{id}', 'NewsController@updateSubmit')
        ->name('update-submit')
        ->where('id','[0-9]+');
    Route::get('/create', 'NewsController@create')
        ->name('create');
    Route::post('/create/submit', 'NewsController@submit')
        ->name('submit');
    Route::get('/delete/{id}', 'NewsController@newsDelete')
        ->name('news::delete')
        ->where('id','[0-9]+');
});

/**
 * Профиль
 */
Route::post('/admin/profile/update', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])
        ->name('profile::update');
Route::get('/admin/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'profile'])
        ->name('profile::profile');

/**
 * Авторизация
 */
Route::get('login', [App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])
    ->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])
    ->name('logout');
    
/**
 * Локализация
 */
Route::get('/locale/{lang}', [App\Http\Controllers\LocaleController::class, 'index'])
    ->name('locale');
    
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('/{category}', [NewsController::class, 'category'])
    ->name('category');