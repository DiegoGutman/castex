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
    if (auth()->user()) {
        return redirect()->route('tasks');
    }

    return view('welcome');
});

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/tasks', 'HomeController@tasks')->name('tasks');
Route::get('/cx', 'HomeController@cx')->name('cx');

Route::get('tasks/{id}', 'TaskController@show');

Route::get('test/{id}', function($id){
    $user = \App\User::find($id);
    $user->notify(new \App\Notifications\EventNotification('nueva notificacion'));
});

Route::get('task-create', function () {
    \App\Task::create(
        [
            'user_id' => 1,
            'name' => 'Lavar los platos',
            'description' => 'Lavar los platos',
            'asigned_by' => 1,
            'success' => 0
        ]
    );
});


