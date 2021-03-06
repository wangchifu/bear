<?php
Route::get('every_year_setup', 'EveryYearSetupController@index')->name('every_year_setup.index');
Route::get('every_year_setup/day_create', 'EveryYearSetupController@day_create')->name('every_year_setup.day_create');
Route::post('every_year_setup/day_store', 'EveryYearSetupController@day_store')->name('every_year_setup.day_store');
Route::get('every_year_setup/{school_day}/day_edit', 'EveryYearSetupController@day_edit')->name('every_year_setup.day_edit');
Route::patch('every_year_setup/{school_day}/day_update', 'EveryYearSetupController@day_update')->name('every_year_setup.day_update');
Route::get('every_year_setup/{school_day}/day_set_active', 'EveryYearSetupController@day_set_active')->name('every_year_setup.day_set_active');
Route::get('every_year_setup/{school_day}/day_destroy', 'EveryYearSetupController@day_destroy')->name('every_year_setup.day_destroy');


Route::match(['get','post'],'every_year_setup/class_setup', 'EveryYearSetupController@class_setup')->name('every_year_setup.class_setup');
Route::get('every_year_setup/{year_seme}/class_edit', 'EveryYearSetupController@class_edit')->name('every_year_setup.class_edit');
Route::post('every_year_setup/class_store', 'EveryYearSetupController@class_store')->name('every_year_setup.class_store');
Route::post('every_year_setup/class_update', 'EveryYearSetupController@class_update')->name('every_year_setup.class_update');

Route::match(['get','post'],'every_year_setup/school_day', 'EveryYearSetupController@school_day')->name('every_year_setup.school_day');
Route::get('every_year_setup/{year_seme}/{grade}/school_day_edit', 'EveryYearSetupController@school_day_edit')->name('every_year_setup.school_day_edit');
Route::post('every_year_setup/school_day_store', 'EveryYearSetupController@school_day_store')->name('every_year_setup.school_day_store');
Route::patch('every_year_setup/{seme_course_date}/school_day_update', 'EveryYearSetupController@school_day_update')->name('every_year_setup.school_day_update');


Route::match(['get','post'],'every_year_setup/score_setup', 'EveryYearSetupController@score_setup')->name('every_year_setup.score_setup');
Route::get('every_year_setup/{year_seme}/{grade}/score_edit', 'EveryYearSetupController@score_edit')->name('every_year_setup.score_edit');
Route::post('every_year_setup/score_save', 'EveryYearSetupController@score_save')->name('every_year_setup.score_save');


Route::match(['get','post'],'every_year_setup/course_setup', 'EveryYearSetupController@course_setup')->name('every_year_setup.course_setup');
Route::get('every_year_setup/{year_seme}/{class_sn}/course_show', 'EveryYearSetupController@course_show')->name('every_year_setup.course_show');
Route::get('every_year_setup/curriculum_guideline', 'EveryYearSetupController@curriculum_guideline')->name('every_year_setup.curriculum_guideline');
Route::post('every_year_setup/curriculum_guideline_store', 'EveryYearSetupController@curriculum_guideline_store')->name('every_year_setup.curriculum_guideline_store');
Route::get('every_year_setup/{curriculum_guideline}/curriculum_guideline_change', 'EveryYearSetupController@curriculum_guideline_change')->name('every_year_setup.curriculum_guideline_change');


Route::get('every_year_setup/curriculum_setup', 'EveryYearSetupController@curriculum_setup')->name('every_year_setup.curriculum_setup');

Route::match(['get','post'],'every_year_setup/teacher_setup', 'EveryYearSetupController@teacher_setup')->name('every_year_setup.teacher_setup');
Route::get('every_year_setup/{year_seme}/teacher_edit', 'EveryYearSetupController@teacher_edit')->name('every_year_setup.teacher_edit');
Route::post('every_year_setup/teacher_save', 'EveryYearSetupController@teacher_save')->name('every_year_setup.teacher_save');
