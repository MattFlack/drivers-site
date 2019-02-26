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

Route::post('/admin/products', 'ProductController@store');
Route::get('/admin/products/create', 'ProductController@create');
Route::get('/admin/products/{product}', 'ProductController@show');
Route::get('/admin/products/{product}/edit', 'ProductController@edit');
Route::patch('/admin/products/{product}', 'ProductController@update');

Route::get('/admin/products/{product}/driver-kits/create', 'DriverKitController@create');
Route::post('/admin/products/{product}/driver-kits', 'DriverKitController@store');
Route::get('/admin/products/{product}/driver-kits/{driverKit}/edit', 'DriverKitController@edit');
Route::patch('/admin/products/{product}/driver-kits/{driverKit}', 'DriverKitController@update');

Route::get('/admin/products/{product}/bios/create', 'BiosController@create');
Route::post('/admin/products/{product}/bios', 'BiosController@store');
Route::get('/admin/products/{product}/bios/{bios}/edit', 'BiosController@edit');
Route::patch('/admin/products/{product}/bios/{bios}', 'BiosController@update');

Route::post('/admin/product-categories', 'ProductCategoryController@store');
Route::get('/admin/product-categories/create', 'ProductCategoryController@create');
Route::get('/admin/product-categories/{productCategory}/edit', 'ProductCategoryController@edit');
Route::patch('/admin/product-categories/{productCategory}', 'ProductCategoryController@update');

Route::post('/admin/os-versions', 'OSVersionController@store');
Route::get('/admin/os-versions/create', 'OSVersionController@create');
Route::get('/admin/os-versions/{osVersion}/edit', 'OSVersionController@edit');
Route::patch('/admin/os-versions/{osVersion}', 'OSVersionController@update');

Route::get('/bios', 'BiosController@index');
Route::get('/driver-kits', 'DriverKitController@index');