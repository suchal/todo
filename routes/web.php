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
Route::post('/lists/{list}/share', 'ListController@share');

Route::get('/lists/{list}', 'ItemController@index');
Route::post('lists/{list}/items', 'ItemController@store');
Route::patch('lists/{list}/items', 'ItemController@update');
Route::delete('lists/{list}/items/{item}', 'ItemController@destroy');
Route::post('lists/{list}/items/{item}/toggle', 'ItemController@toggle');
