<?php

use Illuminate\Support\Facades\Route;

// index
Route::get('/', 'MainController@index')
    -> name('index');
// employee info
Route::get('/employee/{id}', 'MainController@empShow')
    -> name('emp-show');
