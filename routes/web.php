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

//ゲストログイン用
Route::get('guest', 'Auth\LoginController@guestLogin')->name('login.guest');


//ログイン必須
Route::group(
    ['prefix' => 'application', 'middleware' => 'auth'],
    function () {
        Route::get('create', 'ApplicationFormController@create')->name('application.create');

        //新規登録編集画面
        Route::get('edit/{id}', 'ApplicationFormController@edit')->name('application.edit');

        //新規登録
        Route::post('register', 'ApplicationFormController@register')->name('application.register');

        //更新編集画面
        Route::get('update_edit/{au_id}', 'ApplicationFormController@update_edit')->name('application.update_edit');

        //更新
        Route::post('update', 'ApplicationFormController@update')->name('application.update');



        Route::get('detailpage/{id}', 'ApplicationFormController@detailpage')->name('application.detailpage');

        Route::post('/like', 'ApplicationFormController@createlike')->name('application.createlike');
        Route::put('/{application}/like', 'ApplicationFormController@like')->name('application.like');
        Route::delete('/{application}/like', 'ApplicationFormController@unlike')->name('application.unlike');

    }
);


//ログイン必須でない
Route::group(
    ['prefix' => 'application'],
    function () {
        Route::get('index', 'ApplicationFormController@index')->name('application.index');
        Route::get('detailpage/{id}', 'ApplicationFormController@detailpage')->name('application.detailpage');
    }
);

Route::get('/{application}/count', 'ApplicationFormController@count')->name('count');
// Route::get('/{name}/application', function () {
//     return App\User::all();
// });

Route::prefix('users')->name('users.')->group(function () {
    // Route::get('/{name}/application', function () {
    //      return App\User::all();
    // } );
    Route::get('/mypage/{name}', 'UserController@show')->name('show');

    Route::middleware('auth')->group(function () {
        Route::get('/index', 'UserController@index')->name('index');
        Route::post('/index', 'UserController@store')->name('store');

        Route::get('/edit', 'UserController@edit')->name('edit');
        Route::post('/edit', 'UserController@update')->name('update');
        Route::put('/{name}/follow', 'UserController@follow')->name('follow');
        Route::delete('/{name}/follow', 'UserController@unfollow')->name('unfollow');
    });
});


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
