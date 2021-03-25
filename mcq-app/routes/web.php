<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
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
Route::view('/', 'welcome');
Auth::routes();

Route::get('/login/admin', 'App\Http\Controllers\Auth\LoginController@showAdminLoginForm');
// Route::get('/login/moderator', 'App\Http\Controllers\Auth\LoginController@showModeratorLoginForm');
Route::get('/register/admin', 'App\Http\Controllers\Auth\RegisterController@showAdminRegisterForm');
// Route::get('/register/moderator', 'App\Http\Controllers\Auth\RegisterController@showModeratorRegisterForm');


Route::get('home', 'App\Http\Controllers\HomeController@userHome')->middleware('auth')->name('home');

Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
    Route::view('/', 'admin.pages.dashboard');
    Route::resource('category', 'App\Http\Controllers\CategoryController');
    Route::post('sub_category', 'App\Http\Controllers\CategoryController@storeSubCat')->name('sub_cat');
    Route::post('sub_category/destroy{id}', 'App\Http\Controllers\CategoryController@destroySubCat')->name('sub_cat.destroy');

    Route::resource('question', 'App\Http\Controllers\QuestionController');
});