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

Route::get('/customer', 'CustomerController@index');
Route::get('/customer/create', 'CustomerController@create');
Route::get('/customer/{customerId}', 'CustomerController@show');
Route::get('/customer/{customerId}/edit', 'CustomerController@edit');
Route::patch('/customer/{customer}', 'CustomerController@update');
Route::post('/store', 'CustomerController@store');



