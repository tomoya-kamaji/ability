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
    ['prefix' => 'contact', 'middleware' => 'auth'],
    function () {
        Route::get('index', 'ContactFormController@index')->name('contact.index');
        Route::get('create', 'ContactFormController@create')->name('contact.create');
    }
);
Route::group(
    ['prefix' => 'application', 'middleware' => 'auth'],
    function () {
        Route::get('index', 'ApplicationFormController@index')->name('application.index');
        Route::get('create', 'ApplicationFormController@create')->name('application.create');
    }
);







Auth::routes();

// Route::resource('contacts', 'ContactFormController')->only([
//     'index', 'show'
// ]);

Route::get('/home', 'HomeController@index')->name('home');
