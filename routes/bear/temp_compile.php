<?php
Route::get('temp_compile', 'TempCompileController@index')->name('temp_compile.index');
Route::post('temp_compile/csv_upload', 'TempCompileController@csv_upload')->name('temp_compile.csv_upload');
