<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\HomepageController;
use App\Http\Controllers\PostController;

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
//Homepage
Route::get('/','HomepageController@index')->name('index');
Route::get('/product','HomepageController@productPage')->name('product.page');

///Profile
Route::post('/updateProfile','ProfileController@updateAccount')->name('update.account');

Route::post('/updateProfile/socials','ProfileController@updateSocials')->name('update.account.socials');


Route::get('/profile/{username}','ProfileController@viewProfile')->name('user.profile');
Route::get('/profile-settings/{username}','ProfileController@settings')->name('user.profile.settings');


///Donations
Route::post('/profile/donation/{userid}','DonationController@donate')->name('donation');


///Login
Route::get('/login','AuthController@indexLog')->name('loginpage');
Route::post('/loginpost','AuthController@loginPost')->name('login.auth');
Route::get('/logout','AuthController@logout')->name('logout');
//Register
Route::get('/register','AuthController@indexReg')->name('registerpage');
Route::post('/register-now','AuthController@registerPost')->name('register');

// Routes that require user authentication
Route::group(['middleware' => 'checkUser'], function () {

  // Posts
  Route::post('/profile/posts','PostController@create')->name('createpost');
  Route::post('/profile/posts/{postId}/delete','PostController@delete');
  Route::get('profile/posts/getData','PostController@getData')->name('post.getdata');
  Route::post('profile/posts/update','PostController@update')->name('post.update');
  Route::post('profile/posts/delete','PostController@delete')->name('post.delete');
  // Social Links
  Route::post('/profile/social-link','SocialLink@create');
  Route::post('/profile/social-link/{linkId}/delete','SocialLink@delete');

});

// Donation
Route::post('/donate','DonationController@donate');
