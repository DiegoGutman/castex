<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('facebook-login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('test/{id}', function($id){
    $user = \App\User::find($id);
    $user->notify(new \App\Notifications\EventNotification('nueva notificacion'));
});


