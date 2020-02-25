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

    Route::middleware(['verify.token'])->group(function() {
        Route::get('/token/status', 'AuthController@getTokenStatus')->name('auth.token.status');
        Route::get('/token', 'AuthController@refreshToken')->name('auth.token.refresh');
    });
});

Route::group(['middleware' => 'refresh.token'], function() {
    Route::get('/todo-lists', 'ToDoListController@getAllToDoList')->name('todoList.all');
    Route::get('/todo-list/{id}', 'ToDoListController@getToDoListById')->name('todoList.get');
    Route::post('/todo-list', 'ToDoListController@addToDoList')->name('todoList.add');
    Route::patch('/todo-list/{id}', 'ToDoListController@updateToDoListById')->name('todoList.update');
    Route::delete('/todo-list/{id}', 'ToDoListController@deleteToDoListById')->name('todoList.delete');
    Route::delete('/todo-lists', 'ToDoListController@deleteAllToDoList')->name('todoList.delete.all');
});