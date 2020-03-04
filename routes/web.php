<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('products', 'ProductController');
Route::resource('market', 'MarketController');
Route::resource('ship', 'ShippingController');
Route::post('/toCart', 'MarketController@addCart');

Route::post('/checkout', 'ShippingController@checkout')->name('checkout');
Route::get('/myCart','MarketController@myCart')->name('market.myCart');
Route::get('/placeOrder','ShippingController@placeOrder')->name('placeOrder');

// Route for filters products by category
Route::post("/market/category/{item}", 'MarketController@byCategory')->name('market.byCategory');


