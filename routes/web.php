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

Auth::routes(['register' => false]);

Route::get('/admin', 'AdminController@index');

Route::get('/admin/products', 'ProductController@index');
Route::post('/admin/products', 'ProductController@store');
Route::get('/admin/products/create', 'ProductController@create');
Route::get('/admin/products/{product}', 'ProductController@show');
Route::get('/admin/products/{product}/edit', 'ProductController@edit');
Route::patch('/admin/products/{product}', 'ProductController@update');
Route::delete('/admin/products/{product}', 'ProductController@destroy');

Route::get('/admin/products/{product}/driver-kits/create', 'DriverKitController@create');
Route::post('/admin/products/{product}/driver-kits', 'DriverKitController@store');
Route::get('/admin/products/{product}/driver-kits/{driverKit}/edit', 'DriverKitController@edit');
Route::patch('/admin/products/{product}/driver-kits/{driverKit}', 'DriverKitController@update');
Route::delete('/admin/products/{product}/driver-kits/{driverKit}', 'DriverKitController@destroy');

Route::get('/admin/products/{product}/bios/create', 'BiosController@create');
Route::post('/admin/products/{product}/bios', 'BiosController@store');
Route::get('/admin/products/{product}/bios/{bios}/edit', 'BiosController@edit');
Route::patch('/admin/products/{product}/bios/{bios}', 'BiosController@update');
Route::delete('/admin/products/{product}/bios/{bios}', 'BiosController@destroy');

Route::get('/admin/product-categories', 'ProductCategoryController@index');
Route::post('/admin/product-categories', 'ProductCategoryController@store');
Route::get('/admin/product-categories/{productCategory}/edit', 'ProductCategoryController@edit');
Route::patch('/admin/product-categories/{productCategory}', 'ProductCategoryController@update');
Route::delete('/admin/product-categories/{productCategory}', 'ProductCategoryController@destroy');

Route::get('/admin/os-versions', 'OSVersionController@index');
Route::post('/admin/os-versions', 'OSVersionController@store');
Route::get('/admin/os-versions/{osVersion}/edit', 'OSVersionController@edit');
Route::patch('/admin/os-versions/{osVersion}', 'OSVersionController@update');
Route::delete('/admin/os-versions/{osVersion}', 'OSVersionController@destroy');

Route::get('/bios', 'BiosController@index');
Route::get('/driver-kits', 'DriverKitController@index');