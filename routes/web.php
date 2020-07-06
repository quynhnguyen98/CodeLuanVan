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
Route::get('/login_','AdminController@getLogin_');
Route::post('/dashboard','AdminController@getIndex');
Route::get('/logout','AdminController@getLogout');

Route::get('/ngay-su-kien','NgaySuKienController@ngay_su_kien');
Route::get('/dashboard','AdminController@getLogin');
Route::get('/tim-kiem-thong-tin','TimKiemThongTinController@tim_kiem_thong_tin');
Route::get('/thong-tin-thanh-vien','ThongTinThanhVienController@thong_tin_thanh_vien');

Route::get('/cklogin','QuanLyThanhVienController@ck_login');
Route::get('/quan-ly-thanh-vien','QuanLyThanhVienController@quan_ly_thanh_vien');
Route::get('/xoa-thanh-vien/{id_nguoi}','QuanLyThanhVienController@xoa_thanh_vien');


Route::get('/them-thanh-vien','ThemThanhVienController@them_thanh_vien');






//Home
Route::get('/','HomeController@index');
Route::get('/post','HomeController@getPost');
Route::get('/tin-tuc','HomeController@getTintuc');
Route::get('/gop-y','HomeController@getGopy');
Route::get('/gioi-thieu','HomeController@getGioithieu');
Route::get('/tintuc/{id}{tieudekhongdau}.html','HomeController@getPost');


//User
Route::any('/login','UserController@getLogin');
Route::post('/login/check','UserController@Login');
Route::get('/signup','UserController@getSignup');
Route::any('/signup/check','UserController@Signup');
Route::get('/user-logout','UserController@Logout');
Route::get('/forgot-password','UserController@getForgot');
Route::post('/forgot-password/check','UserController@sendMail');
Route::get('/resest-pass/{id_taikhoan}','UserController@getResest');
Route::post('/resest-pass/check','UserController@ResestPass');