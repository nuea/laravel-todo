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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


// view all items in the list
Route::get('/', 'TaskController@viewAll');

// view single task
Route::get('{id}', 'TaskController@view');

// add a task to the list
Route::post('/add', 'TaskController@add');

// edit existing task
Route::put('{id}/edit', 'TaskController@edit');

// set status task
Route::patch('{id}/status', 'TaskController@status');

// edit existing task
Route::delete('{id}/delete', 'TaskController@delete');

