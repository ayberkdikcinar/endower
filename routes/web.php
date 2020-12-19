<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\HomepageController;
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

Route::get('/','HomepageController@index')->name('index');
Route::get('/product','HomepageController@productPage')->name('product.page');

///Profile
Route::post('/updateProfile','ProfileController@updateAccount')->name('update.account');
Route::get('/profile/{username}','ProfileController@viewProfile')->name('user.profile');
Route::get('/profile-settings/{username}','ProfileController@settings')->name('user.profile.settings');

///Login
Route::get('/login','AuthController@indexLog')->name('loginpage');
Route::post('/loginpost','AuthController@loginPost')->name('login.auth');
Route::get('/logout','AuthController@logout')->name('logout');
//Register
Route::get('/register','AuthController@indexReg')->name('registerpage');
Route::post('/register-now','AuthController@registerPost')->name('register');




