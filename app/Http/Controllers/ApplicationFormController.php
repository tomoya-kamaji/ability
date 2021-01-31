<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Application;
use App\User;
use Helpers\iTunesapi;

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
        $posts = iTunesapi::iTunessearch($search);

        return view('Application.index', compact('search', 'user', 'posts'));
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
        $posts = iTunesapi::iTuneslookup($id);
        return view('application.edit', compact('user', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        //テーブルに存在するかどうかを確かめる
        //初めてならInsert。2回目ならUpdate
        $application = Application::firstOrNew(['trackName' => $request->trackName]);
        $application->fill($request->all())->save();


        $application->users()->attach(
            $request->user()->id,
            [
                'content' => $request->content,
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


}
