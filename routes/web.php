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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/shops', 'ShopController@show')->name('shops');
Route::get('/shops/preferred', 'ShopController@preferredShops')->name('preferred');
Route::get('/shops/{id}/{like}', 'ShopController@liked');
Route::get('/unlike/{id}', 'ShopController@unlike');

