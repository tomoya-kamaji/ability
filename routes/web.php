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

Route::get('tests/test', 'TestController@index');

Route::group(
    ['prefix' => 'application', 'middleware' => 'auth'],
    function () {
        Route::get('index', 'ApplicationFormController@index')->name('application.index');
        Route::get('create', 'ApplicationFormController@create')->name('application.create');
        Route::get('edit/{id}', 'ApplicationFormController@edit')->name('application.edit');
        Route::post('register', 'ApplicationFormController@register')->name('application.register');
    }
);

Route::group(
    ['prefix' => 'user', 'middleware' => 'auth'],
    function () {
        Route::get('index', 'UserController@index')->name('user.index');
        Route::get('edit/{id}', 'UserController@edit')->name('user.edit');
    }
);

//==========ここから追加==========
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{name}', 'UserController@show')->name('show');
});
//==========ここまで追加==========

Auth::routes();

// Route::resource('contacts', 'ContactFormController')->only([
//     'index', 'show'
// ]);

Route::get('/home', 'HomeController@index')->name('home');
