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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/', 'welcome');
Auth::routes();

Route::get('/login/admin', 'App\Http\Controllers\Auth\LoginController@showAdminLoginForm');
Route::get('/login/moderator', 'App\Http\Controllers\Auth\LoginController@showModeratorLoginForm');
Route::get('/register/admin', 'App\Http\Controllers\Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/moderator', 'App\Http\Controllers\Auth\RegisterController@showModeratorRegisterForm');

Route::post('/login/admin', 'App\Http\Controllers\Auth\LoginController@adminLogin');
Route::post('/login/moderator', 'App\Http\Controllers\Auth\LoginController@ModeratorLogin');
Route::post('/register/admin', 'App\Http\Controllers\Auth\RegisterController@createAdmin');
Route::post('/register/moderator', 'App\Http\Controllers\Auth\RegisterController@createModerator');

Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin');
Route::view('/moderator', 'moderator');