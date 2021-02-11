<?php

use Illuminate\Support\Facades\Route;

// page - index
Route::get('/', 'MainController@index')
    -> name('index');
// page - employee info
Route::get('/employee/{id}', 'MainController@empShow')
    -> name('emp-show');

// location index
Route::get('/index-location', 'MainController@indexLocation')
    -> name('index-location');
// location show
Route::get('/show-location/{id}', 'MainController@showLocation')
    -> name('show-location');
    
// typology index
Route::get('/index-typology', 'MainController@indexTypology')
    -> name('index-typology');
// typology show
Route::get('/index-typology/show-typology/{id}', 'MainController@showTypology')
    -> name('show-typology');
// page - create new typology
Route::get('/create-typology', 'MainController@typologyCreate')
    -> name('create-typology');
// create new typology (store)
Route::post('/typology/create', 'MainController@typologyStore') 
    -> name('store-typology'); 
// page - typology update 
Route::get('/typology/update-page/{id}', 'MainController@typologyUpdatePage') 
    -> name('update-typology-page'); 
// typology update 
Route::post('/typology/update-page/update/{id}', 'MainController@typologyUpdate') 
-> name('update-typology'); 

// page - task index
Route::get('/index-task', 'MainController@indexTask')
    -> name('index-task');
// page - task show
Route::get('/index-task/task/{id}', 'MainController@showTask')
    -> name('show-task');
// page - create new task
Route::get('/create-task', 'MainController@taskCreate')
    -> name('create-task');
// create new task
Route::post('/task/store', 'MainController@taskStore')
    -> name('store-task');
// update (edit) task page
Route::get('/update-task/{id}', 'MainController@taskUpdatePage')
    -> name('update-task-page');
Route::post('/update-task/{id}', 'MainController@taskUpdate')
-> name('update-task');    

