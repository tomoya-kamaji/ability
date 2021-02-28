<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Application;
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
        return view('Application.index', compact('search', 'user','applications'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $applications = iTunesapi::iTuneslookup($id);

        return view('application.edit', compact('user', 'applications'));
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
        $applicationreviews = $application->application_user;

        $is_image = false;
        if (Storage::disk('local')->exists('public/profile_images/' . Auth::id() . '.jpg')) {
            $is_image = true;
        }

        return view('application.detailpage', compact('user', 'applications', 'applicationreviews', 'is_image'));
    }

    /**
     * Show the form for editing the specified resource.
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
        return redirect('application/index');
    }

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
