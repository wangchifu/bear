<?php
Route::match(['get','post'],'teachers_manage', 'TeachersManageController@index')->name('teachers_manage.index');
Route::get('teachers_manage/create', 'TeachersManageController@create')->name('teachers_manage.create');
Route::post('teachers_manage/edit', 'TeachersManageController@edit')->name('teachers_manage.edit');
Route::post('teachers_manage/update', 'TeachersManageController@update')->name('teachers_manage.update');
Route::post('teachers_manage/store', 'TeachersManageController@store')->name('teachers_manage.store');
Route::post('teachers_manage/check_username', 'TeachersManageController@check_username')->name('teachers_manage.check_username');
Route::post('teachers_manage/check_id', 'TeachersManageController@check_id')->name('teachers_manage.check_id');
Route::get('teachers_manage/list', 'TeachersManageController@list')->name('teachers_manage.list');
