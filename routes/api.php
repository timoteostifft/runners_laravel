<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//runners routes
Route::get('/home','App\Http\Controllers\RunnerController@list');
Route::post('/home','App\Http\Controllers\RunnerController@register');
Route::delete('/home/{id}', 'App\Http\Controllers\RunnerController@remove');
