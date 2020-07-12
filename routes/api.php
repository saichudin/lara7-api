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
Route::get('/mobil', 'MobilController@index');
Route::get('/mobil/search/{id}', 'MobilController@show');
Route::post('/mobil', 'MobilController@store');
Route::put('/mobil/{id}', 'MobilController@update');
Route::delete('/mobil/{id}', 'MobilController@destroy');