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
    Route::post('/register', 'RegisterController@create')->name('auth.register');
    Route::post('/login', 'LoginController@login')->name('auth.login');
    Route::get('/access_token', 'AuthController@getAccessToken')->name('auth.getToken');
});

Route::group(['middleware' => 'verify.token'], function() {
    Route::get('/todo-lists', 'ToDoListController@getAllToDoList')->name('todoList.all');
    Route::get('/todo-list/{id}', 'ToDoListController@getToDoListById')->name('todoList.get');
    Route::post('/todo-list', 'ToDoListController@addToDoList')->name('todoList.add');
});