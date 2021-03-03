<?php

namespace App\Http\Controllers;

use App\Application;
use App\User;
use App\ApplicationUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * ホーム画面
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $recent_applications = DB::table('application_user')
        ->join('applications', 'application_user.application_id', '=', 'applications.id')
        ->orderBy('application_user.created_at', 'desc')
        ->take(4)
        ->get();

        $manyreview_applications = DB::table('application_user')
        ->join('applications', 'application_user.application_id', '=', 'applications.id')
        ->select(DB::raw('count(*) as application_count, application_id,trackId ,trackName, artistName, artworkURL512'))
        ->groupBy('application_id', 'application_id', 'trackName', 'artistName', 'artworkURL512','evaluation')
        ->orderBy('application_count', 'desc')
        ->take(4)
        ->get();

        // applicationsに平均値を持たせておこう
        $applications = Application::all();

        return view('home', compact('applications','user','manyreview_applications', 'recent_applications'));
    }
}
