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
Route::get('logout', 'Auth\LoginController@logout');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/lists', 'ListController@index');
Route::post('/lists', 'ListController@store');
Route::patch('/lists', 'ListController@update');
Route::delete('/lists/{list}', 'ListController@destroy');
Route::get('/lists/{list}', 'ListController@show');

Route::post('/items', 'ItemController@store');
Route::patch('/items', 'ItemController@update');
Route::delete('/items/{item}', 'ItemController@destroy');
Route::post('/items/toggle', 'ItemController@destroy');
