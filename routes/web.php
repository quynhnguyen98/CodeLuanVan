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
//Home
Route::get('/','HomeController@index');
//User
Route::any('/login','UserController@getLogin');
Route::post('/login/check','UserController@Login');
Route::any('/signup','UserController@getSignup');
Route::post('/signup/check','UserController@Signup');
Route::get('/user-logout','UserController@Logout');