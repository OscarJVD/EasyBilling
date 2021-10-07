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
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Auth::routes(['verify' => true]);

Auth::routes();

Route::resource('company', 'CompanyController');
Route::post('company/status/{id}', 'CompanyController@updateStatus');



Route::resource('category', 'CategoryController');
Route::post('category/status/{id}', 'CategoryController@updateStatus');

Route::resource('status', 'StatusController');

Route::resource('bill', 'BillController');
Route::get('bill/addProduct/{id}', 'BillController@addProduct');

Route::resource('product', 'ProductController');
Route::post('products/import', 'ProductController@import')->name('products.import.excel');
Route::post('product/status/{id}', 'ProductController@updateStatus');

Route::resource('provider', 'ProviderController');

Route::resource('user', 'UserController');

Route::resource('type_status', 'TypeStatusController');

Route::resource('role', 'RoleController');
Route::post('role/status/{id}', 'RoleController@updateStatus');

Route::resource('orders', 'OrderController');

Route::resource('shop', 'ShopController');
Route::post('shop/status/{id}', 'ShopController@updateStatus');

Route::get('/com', function () {
    return view('welcome');
})->middleware('verified','company');

Route::get('/admin', function () {
    return view('welcome');
})->middleware('verified','admin');

Route::get('/pro', function () {
    return view('welcome');
})->middleware('verified','winemaker');

Route::get('/bod', function () {
    return view('welcome');
})->middleware('verified','provider');