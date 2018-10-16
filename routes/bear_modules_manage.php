<?php

//管理員
Route::group(['middleware' => 'admin'],function(){
    Route::get('modules_manage/{folder_id?}/{folder?}', 'ModulesManageController@index')->where('folder_id', '[0-9]+')->name('modules_manage.index');
    Route::get('modules_manage/folder', 'ModulesManageController@folder')->name('modules_manage.folder');
    Route::post('modules_manage/folder_store', 'ModulesManageController@folder_store')->name('modules_manage.folder_store');
    Route::patch('modules_manage/{module}/folder_update', 'ModulesManageController@folder_update')->name('modules_manage.folder_update');
    Route::delete('modules_manage/{power}/power_delete', 'ModulesManageController@power_delete')->name('modules_manage.power_delete');
});
