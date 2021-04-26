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
Route::get('note', 'App\Http\Controllers\Controller@note');
Route::get('note/{id}', 'App\Http\Controllers\Controller@noteById');

Route::post('login', 'Auth\LoginController@login');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('note', 'App\Http\Controllers\Controller@noteSave');
    Route::put('note/{id}', 'App\Http\Controllers\Controller@noteEdit');
    Route::delete('note/{id}', 'App\Http\Controllers\Controller@noteDelete');
    Route::get('refresh', 'Auth\LoginController@refresh');});
