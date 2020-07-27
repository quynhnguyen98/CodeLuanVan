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
Route::get('/fullcalendar','NgaySuKienController@index');
Route::post('/fullcalendar/create','NgaySuKienController@store');
Route::post('/fullcalendar/update','NgaySuKienController@update');
Route::post('/fullcalendar/delete','NgaySuKienController@destroy');


Route::get('/dashboard','AdminController@getLogin');
Route::get('/tim-kiem-thong-tin','TimKiemThongTinController@tim_kiem_thong_tin');
Route::get('/thong-tin-thanh-vien','ThongTinThanhVienController@thong_tin_thanh_vien');

Route::get('/cklogin','QuanLyThanhVienController@ck_login');
Route::get('/quan-ly-thanh-vien','QuanLyThanhVienController@quan_ly_thanh_vien');
Route::get('/xoa-thanh-vien/{id_nguoi}','QuanLyThanhVienController@xoa_thanh_vien');


Route::get('/them-thanh-vien','ThemThanhVienController@them_thanh_vien');
Route::get('/cay-gia-pha','TreeController@cay_gia_pha');
Route::get('/data-tree','TreeController@data_tree');

Route::post('/mail-event','NgaySuKienController@mailevent');
Route::get('/quan-ly-comment','CommentController@getComment');
Route::get('/active/{id_gopy}','CommentController@active');
Route::get('/unactive/{id_gopy}','CommentController@unactive');
Route::get('/nguoi','TreeController@getnguoi');
Route::post('/save-person','ThemThanhVienController@save_person');
Route::get('/quan-ly-tin-tuc','TinTucController@getIndex');
Route::get('/xoa-tin-tuc/{id_tintuc}','TinTucController@xoa_post');

//Home
Route::get('/','HomeController@index');
Route::get('/post','HomeController@getPost');
Route::get('/tin-tuc','HomeController@getTintuc');
Route::get('/gop-y','HomeController@getGopy');
Route::get('/gioi-thieu','HomeController@getGioithieu');
Route::get('/tintuc/{id}/{tieudekhongdau}.html','HomeController@getPost');
Route::post('/tintuc/{id}/{tieudekhongdau}.html','HomeController@postComment');


//User
Route::any('/login','UserController@getLogin')->name('getLogin');
Route::post('/login/check','UserController@Login')->name('login');
Route::get('/signup','UserController@getSignup');
Route::any('/signup/check','UserController@Signup');
Route::get('/user-logout','UserController@Logout')->name('logout');
Route::get('/forgot-password','UserController@getForgot');
Route::post('/forgot-password/check','UserController@sendMail');
Route::get('/resest-pass/{id_taikhoan}','UserController@getResest');

Route::post('/resest-pass/check','UserController@ResestPass');
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');
Route::post('/resest-pass/check','UserController@ResestPass');
