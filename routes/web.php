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
Route::get('products', 'ProductController@index')->name('index');
Route::get('products/{id}', 'ProductController@show')->name('show');

Route::get('create', 'ProductController@create')->name('create');
Route::post('create', 'ProductController@insert')->name('insert');

Route::get('delete/{id}', 'ProductController@delete')->name('delete');

Route::get('{productId}/shopping', 'ShoppingController@storeCart')->name('cart.store');
Route::get('cart', 'ShoppingController@showCart')->name('cart.show');
