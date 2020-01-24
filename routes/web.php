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

Route::get('/','Acc_Controller@home');
Route::get('/allproduct','Acc_Controller@allproduct');
Route::get('/getbycate','Acc_Controller@getbycate');
Route::get('/detail/{id}','Acc_Controller@detail');
Route::get('/getbysearch','Acc_Controller@getbysearch');
Route::get('/getbyamount','Acc_Controller@getbyamount');
Route::get('/getbycatpro','Acc_Controller@getbycatpro');
Route::get('/detailcard','Acc_Controller@detailcard');
Route::get('/addtocard/{id}/{nbr}','Acc_Controller@addtocard');
Route::get('/getpanier','Acc_Controller@getpanier');


//-----------------Tawfiq
Route::get('/cart','CartController@cart');
Route::get('/deletecart/{id}','CartController@destroyPanier');
Route::get('/updatecart/{id}/{qte}','CartController@updatePanier');

Route::get('/wishlist','CartController@wishlist');
Route::get('/deletewishlist/{id}','CartController@destroyWishlist');

Route::get('/checkout','CartController@checkout');
Route::post('payment','CartController@payment');

Route::get('/commandes','CartController@commandes');
Route::get('/commandes/{id}','CartController@detail');


//--------------
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
