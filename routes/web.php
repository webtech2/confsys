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
Route::get('/', 'ConferenceController@index');
Route::resource('conference', 'ConferenceController', ['except' => ['edit', 'update', 'destroy']]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin', 'AdminController');
Route::resource('country', 'CountryController', ['only' => ['create', 'store']]);
Route::resource('city', 'CityController', ['only' => ['create', 'store']]);
Route::resource('discount', 'DiscountController', ['only' => ['create', 'store']]);
Route::get('countries/conferences', 'ConferenceController@indexByCountry');