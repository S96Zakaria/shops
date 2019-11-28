<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/shops',            'ShopController@nearbyShops')->name('nearby');
Route::get('/shops/preferred',  'ShopController@preferredShops')->name('preferred');
Route::post('/like',       'ShopController@like');
Route::post('/unlike',     'ShopController@unlike');

