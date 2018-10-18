<?php
Route::get('temp_compile', 'TempCompileController@index')->name('temp_compile.index');
Route::post('temp_compile/csv_import', 'TempCompileController@csv_import')->name('temp_compile.csv_import');
