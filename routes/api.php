<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//runners routes
Route::get('/home/runners/list','App\Http\Controllers\RunnerController@list');
Route::post('/home/runners/add','App\Http\Controllers\RunnerController@register');
Route::delete('/home/runners/remove/{id}', 'App\Http\Controllers\RunnerController@remove');

//tests routes
Route::get('/home/tests/list','App\Http\Controllers\TestController@list');
Route::post('/home/tests/add','App\Http\Controllers\TestController@register');
Route::delete('/home/tests/remove/{testId}', 'App\Http\Controllers\TestController@remove');

//runners|tests routes
Route::get('/home/tests/list/{idTest}/{idRunner}','App\Http\Controllers\RunnerTestController@list');
Route::post('/home/tests/add/{idTest}/{idRunner}','App\Http\Controllers\RunnerTestController@register');
Route::delete('/home/tests/remove/{testId}/{runnerId}','App\Http\Controllers\RunnerTestController@remove');

//insert results
Route::post('/home/tests/setResult/{testId}/{runnerId}', 'App\Http\Controllers\RunnerTestController@setResult');
