<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Helpers\iTunesapi;

use App\Http\Requests\ProfileRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * プロフィール編集画面
     */
    public function index()
    {
        $user = Auth::user();
        $is_image = false;
        if (Storage::disk('local')->exists('public/profile_images/' . Auth::id() . '.jpg')) {
            $is_image = true;
        }

        return view('users/index', compact('user','is_image'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * ユーザ一覧
     */
    public function list()
    {
        // $user = Auth::user();
        $users = User::all();

        return view('users/list', compact('users'));
    }

    /**
     * プロフィールの保存
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileRequest $request)
    {
        // $request->photo->storeAs('public/profile_images', Auth::id() . '.jpg');
        $user = Auth::user();
        $user->fill($request->all())->save();

        return redirect('users/index')->with('success', '新しいプロフィールを登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * マイページ
     */
    public function show(string $name)
    {
        $user = User::where('name', $name)->first();

        //アプリケーション一覧
        $applications = $user->application_user;

        //ブックマークアプリケーション一覧
        $like_applications = $user->like;

        //フォロー一覧
        $followings = $user->followings->sortByDesc('created_at');

        //フォロワー一覧
        $followers = $user->followers->sortByDesc('created_at');

        //ユーザの写真
        $is_image = false;
        if (Storage::disk('local')->exists('public/profile_images/' . Auth::id() . '.jpg')) {
            $is_image = true;
        }
        return view(
            'users.show',
            compact(
                'user',
                'applications',
                'like_applications',
                'followings',
                'followers',
                'is_image'
            ));
    }

    public function follow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['name' => $name ];
    }

    public function unfollow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        return ['name' => $name];
    }

    // public function postEdit($id, Request $request)
    // {
    //     $user = USER::find($id);
    //     $user->your_name = $request->input('id');

    //     // 再度編集画面へリダイレクト
    //     return redirect()->route('users.edit', ['id' => $id]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
