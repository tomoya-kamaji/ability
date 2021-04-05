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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('fileupload/{id}', function ($id) {
    $file_name = request()->file->getClientOriginalName();
    request()->file->storeAs('public/', $file_name);

    Storage::disk('s3')->putFile('/', $file_name);
    // Storage::put($save_path, (string) $img->encode());

    $user_id = Auth::id();

    $user = App\User::where('id', $id)->first();
    // $user = App\User::find($user_id);
    $user->update(['path' =>  $file_name]);
    return $user;

});

Route::post('filedelete/{id}', function ($id) {

    // Storage::put($save_path, (string) $img->encode());

    $user_id = Auth::id();

    $user = App\User::where('id', $id)->first();
    $user->update(['path' =>  null]);
    return $user;

});
