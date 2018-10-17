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


//註冊會員
Route::group(['middleware' => 'auth'],function(){
    Route::get('main/{folder}', 'HomeController@main')->where('folder', '[0-9]+')->name('main');
});


$files = [];
if ($handle = opendir(env('INSTALL_FOLDER').'routes/bear')) { //開啟現在的資料夾
    while (false !== ($name = readdir($handle))) {
        //避免搜尋到的資料夾名稱是false,像是0
        if ($name != "." && $name != "..") {
            $files[] = $name;
        }
    }
    closedir($handle);
}

//將 bear 目錄下的檔案都include進來
foreach($files as $v){
    include('bear/'.$v);
}
