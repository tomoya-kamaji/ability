<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Application;
use App\ApplicationUser;
use App\User;
use Helpers\iTunesapi;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\ReviewRequest;


class ApplicationFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $user = Auth::user();
        $applications = iTunesapi::iTunessearch($search);
        return view('application.index', compact('search', 'user','applications'));
        // return view('Application.index', compact('search', 'user','applications')); ← AWS上だと認識されない、、、？
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * 新規登録編集画面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $applications = iTunesapi::iTuneslookup($id);

        $application = $applications['results'][0];

        return view('application.edit', compact('user', 'application'));
    }

    /**
     * 新規登録更新
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function register(ReviewRequest $request)
    {
        //テーブルに存在するかどうかを確かめる
        //初めてならInsert。2回目ならUpdate
        $application = Application::firstOrNew(['trackName' => $request->trackName]);
        $application->fill($request->all())->save();

        $application->users()->attach(
            $request->user()->id,
            [
                'title' => $request->title,
                'good_point' => $request->good_point,
                'improvement_point' => $request->improvement_point,
                'evaluation' => $request->evaluation
            ]
        );
        return redirect('home')->with('msg_success', '投稿が完了しました。');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailpage($id)
    {
        $user = Auth::user();
        $applications = iTunesapi::iTuneslookup($id);

        $application = Application::where('trackId', $id)->first();
        if (empty($application->application_user)) {
            $applicationreviews=[];
        }else{
            $applicationreviews = $application->application_user;
        }

        $is_image = false;
        if (Storage::disk('local')->exists('public/profile_images/' . Auth::id() . '.jpg')) {
            $is_image = true;
        }
        return view('application.detailpage', compact('user', 'applications', 'applicationreviews', 'is_image'));
    }


    /**
     * レビュー更新画面
     *
     * @param  int  application_id
     * @return \Illuminate\Http\Response
     */
    public function update_edit($id)
    {

        $user = Auth::user();
        $application = Application::where('id', $id)->first();

        $application_user = $application->users()->find($user->id);
        return view('application.update_edit', compact('user', 'application', 'application_user'));
    }

    /**
     * 新規登録更新
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReviewRequest $request)
    {
        $user = Auth::user();
        DB::table('application_user')
        ->where([
            ['user_id', '=', $user->id],
            ['application_id', '=', $request->id],
        ])
            ->update([
                'title' => $request->title,
                'good_point' => $request->good_point,
                'improvement_point' => $request->improvement_point,
                'evaluation' => $request->evaluation,
            ]);
        return redirect(route('users.show', [
            "name" => $user->name
        ]))->with('msg_success', '編集が完了しました');
    }



    /**
     * レビュー削除画面
     *
     * @param  int  application_userid
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = Auth::user();
        $application = Application::where('id', $id)->first();

        $application_user = $application->users()->find($user->id);
        return view('application.delete', compact('user', 'application', 'application_user'));
    }

    /**
     * レビュー削除機能
     *
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {
        $user = Auth::user();

        DB::table('application_user')
        ->where([
            ['user_id', '=', $user->id],
            ['application_id', '=', $request->id],
        ])->delete();


        return redirect(route('users.show', [
            "name" => $user->name
        ]))->with('msg_error', '投稿を削除しました');
    }

    public function like(Request $request, Application $application)
    {

        $application->likes()->detach($request->user()->id);
        $application->likes()->attach($request->user()->id);

        return [
            'id' => $application->id,
            'countLikes' => $application->count_likes,
        ];
    }

    public function unlike(Request $request, Application $application)
    {
        $application->likes()->detach($request->user()->id);

        return [
            'id' => $application->id,
            'countLikes' => $application->count_likes,
        ];
    }

    public function createlike(Request $request)
    {
        $application = Application::firstOrNew(['trackName' => $request->trackName]);
        $application->fill($request->all())->save();

        $application->likes()->attach($request->user()->id);

        return [
            'id' => $application->id,
            'countLikes' => $application->count_likes,
        ];
    }

    public function count(Request $request, Application $application)
    {
        $like = [
            'isLiked' => $application->isLikedBy(Auth::user()),
            'countLikes' => $application->count_likes,
        ];

        return $like;
    }

}
