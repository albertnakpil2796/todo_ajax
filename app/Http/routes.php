<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::get('/','TodoController@index');
Route::post('/destroy',['as' => 'del', 'uses' => 'TodoController@destroy']);
Route::post('/view',['as' => 'vieww', 'uses' => 'TodoController@view']);
Route::post('/edit',['as' => 'editt', 'uses' => 'TodoController@edit']);
Route::post('/update',['as' => 'updatee', 'uses' => 'TodoController@update']);
Route::post('/store',['as' => 'todo.store' , 'uses' => 'TodoController@store'] );
Route::post('/search','TodoController@search');
Route::post('/ajaxtest','TodoController@ajaxTest');



Route::get('/try','TodoController@try');


