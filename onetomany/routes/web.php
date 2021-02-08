<?php

use Illuminate\Support\Facades\Route;

// page - index
Route::get('/', 'MainController@index')
    -> name('index');
// page - employee info
Route::get('/employee/{id}', 'MainController@empShow')
    -> name('emp-show');
// page - create new task
Route::get('/create-task', 'MainController@taskCreate')
    -> name('create-task');
// create new task
Route::post('/task/store', 'MainController@taskStore')
    -> name('store-task');
// update (edit) task
Route::get('/update-task/{id}', 'MainController@taskUpdate')
    -> name('update-task');
// location index
Route::get('/index-location', 'MainController@indexLocation')
    -> name('index-location');
// location show
Route::get('/show-location/{id}', 'MainController@showLocation')
    -> name('show-location');

