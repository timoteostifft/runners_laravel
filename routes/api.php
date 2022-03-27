<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//runners routes
Route::get('/runners/list','App\Http\Controllers\RunnerController@list');
Route::post('/runners/add','App\Http\Controllers\RunnerController@register');
Route::delete('/runners/remove/{id}', 'App\Http\Controllers\RunnerController@remove');

//tests routes
Route::post('/tests/add','App\Http\Controllers\TestController@register');
Route::delete('/tests/remove/{id}', 'App\Http\Controllers\TestController@remove');

//runners|tests routes
Route::get('/tests/list/{idTest}/{idRunner}','App\Http\Controllers\RunnerTestController@list');
Route::post('/tests/add/{idTest}/{idRunner}','App\Http\Controllers\RunnerTestController@register');
Route::delete('/tests/remove/{testId}/{runnerId}','App\Http\Controllers\RunnerTestController@remove');

//insert results
Route::post('/tests/setResult/{testId}/{runnerId}', 'App\Http\Controllers\RunnerTestController@setResult');

//list tests by age
Route::get('tests/listByAge','App\Http\Controllers\TestController@listByAge');

//list tests by result
Route::get('/tests/listByResult','App\Http\Controllers\TestController@listByResult');