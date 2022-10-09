<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('1.0')->group(function(){

    Route::get('/ping', [
        'uses' => '\App\Http\Controllers\Api\v1a\PingController@ping',
        'as' => 'test.ping10'
    ]);

});

Route::prefix('2.0')->group(function(){

    Route::get('/ping', [
        'uses' => '\App\Http\Controllers\Api\v2a\PingController@ping',
        'as' => 'test.ping20'
    ]);

});


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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::fallback(function(){
    return response()->json([
        'message' => 'No entry API for this url'], 404);
});


//Route::apiResource('rooms', '\App\Http\Controllers\Api\v1a\RoomController');
Route::get('rooms', '\App\Http\Controllers\Api\v1a\RoomController@index');
Route::group(['prefix' => 'room'], function () {
    Route::post('store', '\App\Http\Controllers\Api\v1a\RoomController@store');
    Route::get('edit/{uid}', '\App\Http\Controllers\Api\v1a\RoomController@show');
    Route::post('update/{uid}', '\App\Http\Controllers\Api\v1a\RoomController@update');
    Route::delete('delete/{uid}', '\App\Http\Controllers\Api\v1a\RoomController@destroy');
    Route::post('rooms-suspended/{uid}','\App\Http\Controllers\Api\v1a\RoomController@suspended');

});

Route::get('showuser-room', '\App\Http\Controllers\Api\v1a\UserRoomController@showUserRoom');

Route::get('/login', '\App\Http\Controllers\Auth\LoginController@authenticated');