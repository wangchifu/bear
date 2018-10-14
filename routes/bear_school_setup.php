<?php

//管理員
Route::group(['middleware' => 'admin'],function(){
    Route::get('school_setup', 'SchoolSetupController@index')->name('school_setup.index');
    Route::post('school_setup', 'SchoolSetupController@store')->name('school_setup.store');

    Route::patch('school_setup/{school_base}', 'SchoolSetupController@update')->name('school_setup.update');
    Route::get('school_setup/school_room', 'SchoolSetupController@school_room')->name('school_setup.school_room');
    Route::post('school_setup/school_room', 'SchoolSetupController@school_room_store')->name('school_setup.school_room_store');
    Route::get('school_setup/school_room_edit/{school_room}', 'SchoolSetupController@school_room_edit')->name('school_setup.school_room_edit');
    Route::patch('school_setup/school_room/{school_room}', 'SchoolSetupController@school_room_update')->name('school_setup.school_room_update');
    Route::delete('school_setup/school_room/{school_room}', 'SchoolSetupController@school_room_destroy')->name('school_setup.school_room_destroy');

    Route::get('school_setup/school_title', 'SchoolSetupController@school_title')->name('school_setup.school_title');
    Route::post('school_setup/school_title', 'SchoolSetupController@school_title_store')->name('school_setup.school_title_store');
    Route::get('school_setup/school_title_edit/{school_title}', 'SchoolSetupController@school_title_edit')->name('school_setup.school_title_edit');
    Route::patch('school_setup/school_title/{school_title}', 'SchoolSetupController@school_title_update')->name('school_setup.school_title_update');
    Route::delete('school_setup/school_title/{school_title}', 'SchoolSetupController@school_title_destroy')->name('school_setup.school_title_destroy');
});
