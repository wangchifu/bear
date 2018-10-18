<?php
Route::get('temp_compile', 'TempCompileController@index')->name('temp_compile.index');
Route::post('temp_compile/csv_import', 'TempCompileController@csv_import')->name('temp_compile.csv_import');

Route::get('temp_compile/manage', 'TempCompileController@manage')->name('temp_compile.manage');
Route::get('temp_compile/{select_year}/manage', 'TempCompileController@manage_select')->name('temp_compile.manage_select');
