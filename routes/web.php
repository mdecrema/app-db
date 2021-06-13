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
// Route::post('products/create', 'ProductController@store')->name('products.create');

// Cart 
Route::get('/cart', 'CartController@index')->name('cart');
Route::post('products/add-to-cart', 'CartController@store')->name('cart.store');
Route::delete('cart/remove-item/{item}', 'CartController@destroy')->name('cart.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Admin Landing Page
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
    // Products -> all 
    //Route::get('/dashboard/products/all', 'ProductController@productsAll')->name('products.all');
    // Product Create
    Route::get('/dashboard/products/create', 'ProductController@create')->name('products.create');
    // Product Store
    Route::post('/dashboard/products/create', 'ProductController@store')->name('products.store');
    // Product Show
    //Route::get('/new/product/show/{id}', 'ProductController@show')->name('product.show');
    // Product Update
    //Route::get('/dashboard/products/edit/{id}', 'ProductController@edit')->name('products.edit');
    // Product Update
    //Route::post('/dashboard/products/update/{id}', 'ProductController@update')->name('products.update');
    // Orders
    //Route::get('/dashboard/orders', 'OrderController@index')->name('orders.index');
});