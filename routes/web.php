<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{id}', 'ProductController@show')->name('product');

Route::post('/cart/{id}', 'ProductController@addToCart')->name('add-to-cart');
Route::get('/delete', 'ProductController@delete');
Route::get('/checkout', 'ProductController@checkout')->name('checkout');

Route::get('/filter', 'HomeController@filter')->name('filter');
