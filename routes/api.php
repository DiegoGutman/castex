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

Route::group(['middleware'=>'auth:api', 'namespace'=>'Api\V1', 'prefix'=>'v1'], function () {
    Route::get('/notifications/{user}', 'UsersController@notifications');
    Route::delete('/notification/{user}/{notification}', 'UsersController@deleteNotification');
    Route::delete('/notifications/{user}', 'UsersController@deleteNotifications');
    Route::get('tasks', 'TaskController@tasks');
});
