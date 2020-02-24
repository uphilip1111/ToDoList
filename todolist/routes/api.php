<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'] ,function() {
    Route::post('/register', 'RegisterController@create');
    Route::post('/login', 'LoginController@login');
    Route::get('/access_token', 'AuthController@getAccessToken');
});

Route::group(['middleware' => 'verify.token'], function() {
    
});