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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/setState/{lm35}/{fotoresistor}', 'HomeController@setState');
Route::get('/getState', 'HomeController@getState')->name('getState');

Route::get('/setDC/{state}', 'HomeController@setDC');
Route::get('/setBuzzer/{state}', 'HomeController@setBuzzer');
Route::get('/setLED/{state}', 'HomeController@setLED');

Route::get('/getExternal', 'HomeController@getEvery')->name('getExternal');

