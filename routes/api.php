<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DeliveryController;


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
      
Route::apiResource('person',PersonController::class);
Route::apiResource('blog',BlogController::class);
Route::apiResource('delivery',DeliveryController::class);

Route::delete('blogD/{id}','App\Http\Controllers\BlogController@destroy');
Route::delete('personD/{id}','App\Http\Controllers\PersonController@destroy');
Route::delete('deliveryD/{id}','App\Http\Controllers\DeliveryController@destroy');

Route::put('blogs/{id}','App\Http\Controllers\BlogController@update');
