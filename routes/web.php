<?php

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

Route::get('/', 'PagesController@index');
Route::get('/plakater', 'PagesController@plakater');
Route::get('/omos', 'PagesController@omos');
Route::get('/kontakt', 'PagesController@kontakt');

Route::get('/add-to-cart/{id}', 'CartController@getAddToCart')->name('product.addToCart');
Route::get('/shopping-cart', 'CartController@getCart')->name('shopping.cart');
Route::get('/reduce/{id}', 'CartController@getReduceByOne')->name('product.reduceByOne');
Route::get('/remove/{id}', 'CartController@getRemoveItem')->name('product.remove');

Route::get('/checkout', 'CartController@getCheckOut')->name('checkout')->middleware('auth');
Route::post('/checkout', 'CartController@postCheckOut')->name('checkout')->middleware('auth');


Route::resource('cart', 'CartController');
Route::resource('posts', 'PostsController');
Route::resource('products', 'ProductController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

 Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/showproductslist', 'AdminController@showproductslist');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
 });

// 18:15 in the video 


