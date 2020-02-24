<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('products', 'ProductController');
Route::resource('market', 'MarketController');

// Route for filters products by category
Route::post("/market/category/{item}", 'MarketController@byCategory')->name('market.byCategory');


