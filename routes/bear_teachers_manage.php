<?php

//管理員
Route::group(['middleware' => 'admin'],function(){
    Route::get('teachers_manage/{action?}', 'TeachersManageController@index')->name('teachers_manage.index');
    Route::post('teachers_manage/store', 'TeachersManageController@store')->name('teachers_manage.store');
    Route::post('teachers_manage/check', 'TeachersManageController@check')->name('teachers_manage.check');

});
