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

//首頁
Route::get('/', 'HomeController@index')->name('index');

//Auth::routes();
//登入/登出
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//顯示上傳的圖片
Route::get('img/{path}', 'HomeController@getImg');

//下載上傳的檔案
Route::get('file/{file}', 'HomeController@getFile');

//下載public的檔案
Route::get('public_file/{file}', 'HomeController@getPublicFile');

//管理員
Route::group(['middleware' => 'admin'],function(){
    Route::get('admin', 'HomeController@admin')->name('admin');
});

//學校設定
include('bear_school_setup.php');

//模組管理
include('bear_modules_manage.php');

//模組管理
include('bear_teachers_manage.php');
