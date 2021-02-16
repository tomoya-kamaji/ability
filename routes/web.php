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



Route::group(
    ['prefix' => 'application', 'middleware' => 'auth'],
    function () {
        Route::get('index', 'ApplicationFormController@index')->name('application.index');
        Route::get('create', 'ApplicationFormController@create')->name('application.create');
        Route::get('edit/{id}', 'ApplicationFormController@edit')->name('application.edit');
        Route::post('register', 'ApplicationFormController@register')->name('application.register');
        Route::post('/{application}/like', 'ApplicationFormController@like')->name('application.createlike');
        Route::put('/{application}/like', 'ApplicationFormController@like')->name('application.like');
        Route::delete('/{application}/like', 'ApplicationFormController@unlike')->name('application.unlike');

    }
);

///////////
Route::get('/{application}/count', 'ApplicationFormController@count')->name('count');
///////////

Route::get('/{name}/application', function () {
    return App\User::all();
});

//API用
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{name}/application', function () {
         return App\User::all();
    } );
    Route::get('/{name}', 'UserController@show')->name('show');
    Route::middleware('auth')->group(function () {
        Route::put('/{name}/follow', 'UserController@follow')->name('follow');
        Route::delete('/{name}/follow', 'UserController@unfollow')->name('unfollow');
    });
});


// Route::group(
//     ['prefix' => 'user', 'middleware' => 'auth'],
//     function () {
//         Route::get('index', 'UserController@index')->name('user.index');
//         Route::get('edit/{id}', 'UserController@edit')->name('user.edit');
//     }
// );



Auth::routes();

// Route::resource('contacts', 'ContactFormController')->only([
//     'index', 'show'
// ]);

Route::get('/home', 'HomeController@index')->name('home');
