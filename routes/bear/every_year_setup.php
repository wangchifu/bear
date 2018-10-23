<?php
Route::get('every_year_setup', 'EveryYearSetupController@index')->name('every_year_setup.index');
Route::get('every_year_setup/day_create', 'EveryYearSetupController@day_create')->name('every_year_setup.day_create');
Route::post('every_year_setup/day_store', 'EveryYearSetupController@day_store')->name('every_year_setup.day_store');
Route::get('every_year_setup/{school_day}/day_edit', 'EveryYearSetupController@day_edit')->name('every_year_setup.day_edit');
Route::patch('every_year_setup/{school_day}/day_update', 'EveryYearSetupController@day_update')->name('every_year_setup.day_update');
Route::get('every_year_setup/{school_day}/day_set_active', 'EveryYearSetupController@day_set_active')->name('every_year_setup.day_set_active');
Route::get('every_year_setup/{school_day}/day_destroy', 'EveryYearSetupController@day_destroy')->name('every_year_setup.day_destroy');


Route::get('every_year_setup/class_setup', 'EveryYearSetupController@class_setup')->name('every_year_setup.class_setup');
Route::get('every_year_setup/{year_seme}/class_edit', 'EveryYearSetupController@class_edit')->name('every_year_setup.class_edit');
Route::post('every_year_setup/class_store', 'EveryYearSetupController@class_store')->name('every_year_setup.class_store');

Route::get('every_year_setup/school_day', 'EveryYearSetupController@school_day')->name('every_year_setup.school_day');

Route::get('every_year_setup/score_setup', 'EveryYearSetupController@score_setup')->name('every_year_setup.score_setup');

Route::get('every_year_setup/course_setup', 'EveryYearSetupController@course_setup')->name('every_year_setup.course_setup');

Route::get('every_year_setup/curriculum_setup', 'EveryYearSetupController@curriculum_setup')->name('every_year_setup.curriculum_setup');

Route::get('every_year_setup/teacher_setup', 'EveryYearSetupController@teacher_setup')->name('every_year_setup.teacher_setup');
