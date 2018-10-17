<?php
Route::get('simulation', 'SimulationController@index')->name('simulation.index');
Route::get('simulation/{user}/impersonate', 'SimulationController@impersonate')->name('simulation.impersonate');
Route::get('simulation/impersonate_leave', 'HomeController@impersonate_leave')->name('simulation.impersonate_leave');
