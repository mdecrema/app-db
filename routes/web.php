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

Route::get('/', function () {
    return view('homePage');
});

Route::get('/products', 'ProductController@index')->name('products');
Route::get('/products/{id}', 'ProductController@show')->name('products.show');
Route::post('products/create', 'ProductController@store')->name('products.create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
