<?php

//管理員
Route::group(['middleware' => 'admin'],function(){
    Route::get('modules_manage', 'ModulesManageController@index')->name('modules_manage.index');
    Route::get('modules_manage/folder', 'ModulesManageController@folder')->name('modules_manage.folder');
});
