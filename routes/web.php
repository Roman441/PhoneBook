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

Route::get('/', 'UserController@index');
Route::get('/get_user', 'UserController@index_json');
Route::get('phone_books', 'PhoneController@index');
Route::post('user/create', 'UserController@create');
Route::get('user/delete/{id}', 'UserController@destroy');
Route::get('/user/{id}', 'UserController@show');
Route::post('user/edit/{id}', 'UserController@edit');
