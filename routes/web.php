<?php

use Illuminate\Support\Facades\Route;

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
//Admin
Route::get('/admin','AdminController@getLogin');
Route::post('/dashboard','AdminController@getIndex');
Route::get('/logout','AdminController@getLogout');
//Home
Route::get('/','HomeController@index');
//User
Route::get('/login','UserController@getLogin');