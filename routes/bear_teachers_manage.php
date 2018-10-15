<?php

//管理員
Route::group(['middleware' => 'admin'],function(){
    Route::match(['get','post'],'teachers_manage', 'TeachersManageController@index')->name('teachers_manage.index');
    Route::get('teachers_manage/create', 'TeachersManageController@create')->name('teachers_manage.create');
    Route::post('teachers_manage/edit', 'TeachersManageController@edit')->name('teachers_manage.edit');
    Route::patch('teachers_manage/update', 'TeachersManageController@update')->name('teachers_manage.update');
    Route::post('teachers_manage/store', 'TeachersManageController@store')->name('teachers_manage.store');
    Route::post('teachers_manage/check', 'TeachersManageController@check')->name('teachers_manage.check');

});
