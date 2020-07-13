<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', 'TestController@index');
Route::get('/tt', function (){
    return response()->json([
        'value' => 'tt only',
        'message' => 'success'
    ], 200);
});

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');

Route::get('/mobil', 'MobilController@index')->middleware('auth:api');
Route::get('/mobil/{id}', 'MobilController@show')->middleware('auth:api');
Route::post('/mobil', 'MobilController@store')->middleware('auth:api');
Route::put('/mobil/{id}', 'MobilController@update')->middleware('auth:api');
Route::delete('/mobil/{id}', 'MobilController@destroy')->middleware('auth:api');