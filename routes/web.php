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

Route::get('/', 'ProductController@homePage', function() {
    // $value = session('key');
    // $value = session('key', 'default');
    // session(['key' => 'value']);
})->name('homePage');

// Categories
// All SubCategories
Route::get('/categories/subCategories/all', 'AdminController@getAllSubCategories')->name('public.subcategories.all');

// Products
Route::get('/products', 'ProductController@index')->name('products');
Route::get('/products/{type}', 'ProductController@productsByType')->name('productsByType');
Route::get('/products/products/{id}', 'ProductController@show')->name('products.show');
// Route::post('products/create', 'ProductController@store')->name('products.create');

// Ski Rent
 Route::get('/skiRent', 'SkiRentController@index')->name('skiRent');
 Route::post('/skiRent', 'SkiRentController@formSubmit')->name('skiRentForm');
 Route::get('/skiRent/results', 'SkiRentController@searchResults')->name('skiRentResults');
 Route::get('/skiRent/rent', 'SkiRentController@rentEquipment')->name('rentEquipment');

// Cart 
Route::get('/cart', 'CartController@index')->name('cart');
Route::post('products/add-to-cart', 'CartController@store')->name('cart.store');
Route::delete('cart/remove-item/{rowId}/{id}', 'CartController@destroy')->name('cart.destroy');

// Check-out 
Route::get('/payment/checkout/{token}', 'CheckoutController@index')->name('checkout.index');
Route::post('/payment/completed/success', 'CheckoutController@checkout')->name('checkout.checkout');
Route::get('/success','CheckoutController@afterpayment')->name('checkout.completed');

// News
Route::get('/news', 'NewsController@index')->name('news');

// Informations
Route::get('/privacy', 'InfoController@privacy')->name('info.privacy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * 
 * ADMIN DASHBOARD
 * 
 */
Route::prefix('admin')->name('admin.')->middleware('can:admin')->group(function () {      
    // Admin Landing Page
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
    // PROVA PHP MAILER
    Route::get('/dashboard/phpmailer', 'AdminController@phpMailer')->name('php.mailer');
    /**
     * CATEGORIES
     */
    Route::get('/dashboard/categories', 'AdminController@allCategoriesView')->name('allCategories');
    Route::post('/dashboard/categories/store', 'AdminController@storeCategory')->name('categories.store');
    Route::post('/dashboard/categories/update', 'AdminController@updateCategory')->name('categories.update');
    // SubCategoryies by Parent Category ID
    Route::get('/dashboard/categories/subCategories/{parent_category_id}', 'AdminController@getSubCategoriesByParentCategoryId')->name('private.subcategories');
    /**
     * PRODUCTS
     */
    // Products View 
    Route::get('/dashboard/products', 'AdminController@allProductsAdminView')->name('products');
    // Product All
    Route::post('/dashboard/products/all', 'AdminController@getAllProducts')->name('private.products.all');
    // Product Details
    Route::get('/dashboard/products/details/{id}', 'AdminController@getProductDetailsById')->name('private.product.details');
    // Product Update
    Route::post('/dashboard/products/update/{id}', 'ProductController@productUpdate')->name('products.update');
    // Product Create
    Route::get('/dashboard/products/create', 'ProductController@create')->name('products.create');
    // Product Store
    Route::post('/dashboard/products/create', 'ProductController@store')->name('products.store');
    // Products store from CSV file
    Route::post('/dashboard/products/store/csv', 'ProductController@storeProductsFromCSV')->name('products.store.csv');
    // Dowloand products database table as CSV file
    Route::get('/dashboard/products/export/csv', 'ProductController@downloadProductsDatabaseTableAsCSV')->name('products.export.csv');
    // Product Show
    Route::get('/dashboard/products/show/{id}', 'AdminController@show')->name('products.show');
    // Product Delete
    Route::delete('/dashboard/products/delete/{id}', 'AdminController@destroy')->name('products.delete');
    // DELETE ALL Products
    Route::delete('dashboard/products/deleteAll', 'AdminController@deleteAll')->name('deleteAll');
    // Product Show
    //Route::get('/new/product/show/{id}', 'ProductController@show')->name('product.show');
    // Product Update
    //Route::get('/dashboard/products/edit/{id}', 'ProductController@edit')->name('products.edit');
    // Product Update
    //Route::post('/dashboard/products/update/{id}', 'ProductController@update')->name('products.update');

    /**
     * ITEMS
     */
    // Items add
    Route::get('dashboard/items/addItems', 'AdminController@addItems')->name('items.addItems');
    Route::post('dashboard/items/storeItems', 'ProductController@storeItems')->name('items.storeItems');

    /**
     * SKI RENT 
     */ 
    Route::get('dashboard/skiRent/allEquipment', 'AdminController@skiRentAllEquipment')->name('skiRent.allEquipment');
    Route::get('dashboard/skiRent/addEquipment', 'AdminController@skiRentAddEquipment')->name('skiRent.addEquipment');
    Route::post('dashboard/skiRent/store', 'AdminController@skiRentStore')->name('skiRent.store');
    Route::get('dashboard/skiRent/edit/{id}', 'AdminController@skiRentEditEquipment')->name('skiRent.EditEquipment');
    Route::post('dashboard/skiRent/update/{id}', 'AdminController@skiRentUpdateEquipment')->name('skiRent.update');
    Route::get('dashboard/skiRent/allRent', 'AdminController@skiRentAllRent')->name('skiRent.allRent');
    Route::get('dashboard/skiRent/allRent/rentDetails/{id}', 'AdminController@skiRentRentDetails')->name('skiRent.rentDetails');
    Route::get('dashboard/skiRent/deleteRent/{id}', 'AdminController@skiRentDeleteRent')->name('skiRent.deleteRent');
    // Route::post('dashboard/skiRent/allRent/scancode', 'AdminController@changeSkiStatus')->name('skiRent.statusChange');
    Route::post('dashboard/skiRent/rent/addSki', 'AdminController@rentAddSki')->name('skiRent.rentAddSki');
    // All Bar Codes
    Route::get('dashboard/skiRent/skiBarCodes', 'AdminController@skiRentBarCodes')->name('skiRent.barCodes');

    /**
     * USERS
     */
    // All Users
    Route::get('dashboard/users/allUsers', 'AdminController@allUsers')->name('users.allUsers');
    // Guests
    Route::get('dashboard/users/guests', 'AdminController@guests')->name('users.guests');
    /**
     * ORDERS
     */
    Route::get('dashboard/orders/allOrders', 'AdminController@allOrders')->name('orders.allOrders');
    // Route::get('dashboard/orders/progressing', 'AdminController@progressingOrders')->name('orders.progressing');
    Route::get('dashboard/orders/orderDetails/{id}', 'AdminController@orderDetails')->name('orders.orderDetails');
    /**
     * STATISTICS
     */
    Route::get('dashboard/statistics/allStats', 'StatisticController@index')->name('allStats');
});


/**
 * 
 * ERRORS VIEWS
 * 
 */

 // Checkout
 Route::get('/errors/checkoutIndexAccessViolation', 'CheckoutController@checkoutIndexAccessError')->name('checkoutIndexAccessError');