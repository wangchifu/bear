<?php
Route::get('temp_compile', 'TempCompileController@index')->name('temp_compile.index');
Route::post('temp_compile/csv_import', 'TempCompileController@csv_import')->name('temp_compile.csv_import');

Route::get('temp_compile/manage', 'TempCompileController@manage')->name('temp_compile.manage');
Route::get('temp_compile/{select_year}/manage', 'TempCompileController@manage')->name('temp_compile.manage');
Route::get('temp_compile/{select_year}/manage_all_destroy', 'TempCompileController@manage_all_destroy')->name('temp_compile.manage_all_destroy');

Route::get('temp_compile/manage_create', 'TempCompileController@manage_create')->name('temp_compile.manage_create');
Route::post('temp_compile/manage_store', 'TempCompileController@manage_store')->name('temp_compile.manage_store');
Route::get('temp_compile/{new_student}/manage_edit', 'TempCompileController@manage_edit')->name('temp_compile.manage_edit');
Route::post('temp_compile/{new_student}/manage_update', 'TempCompileController@manage_update')->name('temp_compile.manage_update');

Route::post('temp_compile/check_id', 'TempCompileController@check_id')->name('temp_compile.check_id');
Route::get('temp_compile/{new_student}/manage_destroy', 'TempCompileController@manage_destroy')->name('temp_compile.manage_destroy');
Route::patch('temp_compile/{new_student}/change_study', 'TempCompileController@change_study')->name('temp_compile.change_study');

Route::get('temp_compile/{select_year}/report', 'TempCompileController@report')->name('temp_compile.report');
