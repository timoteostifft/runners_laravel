<?php

use Illuminate\Support\Facades\Route;

Route::get('/home','App\Http\Controllers\RunnerController@list');
Route::post('/home','App\Http\Controllers\RunnerController@register');
