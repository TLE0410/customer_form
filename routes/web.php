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
use App\Mail\WelcomeMail;

Route::get('/customer', 'CustomerController@index')->name('/customer');
Route::get('/customer/create', 'CustomerController@create')->name('/customer/create')->middleware('can:create,App\Customer');
Route::get('/customer/{customer}', 'CustomerController@show')->name('/customer/show');
Route::get('/customer/{customer}/edit', 'CustomerController@edit')->name('/customer/edit')->middleware('can:restore,App\Customer');
Route::patch('/customer/{customer}', 'CustomerController@update')->name('/customer/update')->middleware('can:update,App\Customer');
Route::post('/store', 'CustomerController@store')->name('/customer/store')->middleware('can:create,App\Customer');
Route::delete('/customer/{customer}', 'CustomerController@destroy')->name('/customer/delete')->middleware('can:delete,App\Customer');

Route::get('/mail', function() {
    return new WelcomeMail();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
