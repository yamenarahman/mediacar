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

Route::view('/', 'index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/settings', 'SettingsController@index');
Route::put('/settings', 'SettingsController@update');
Route::put('/increment', 'ShiftController@update');
Route::get('/drivers/{id}/shifts', 'ShiftController@show');

Route::group(['middleware' => ['web','auth','role:Admin']], function () {
    Route::resource('drivers', 'DriverController', ['except' => ['create', 'edit']]);
    Route::resource('vendors', 'VendorController', ['except' => ['create', 'edit']]);
    Route::resource('advertisements', 'AdvertisementController', ['except' => ['create', 'edit']]);
});
