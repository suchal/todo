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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/lists', 'ListController@index');
Route::post('/lists', 'ListController@store');
Route::patch('/lists', 'ListController@update');
Route::delete('/lists', 'ListController@destroy');
Route::get('/lists/{list}', 'ListController@show');

Route::post('{list}/items', 'ListController@store');
Route::patch('/items', 'ListController@update');
Route::delete('/items', 'ListController@destroy');
Route::post('/items/toggle', 'ListController@destroy');
