<?php

namespace App\Http\Controllers;

use App\Application;
use App\ApplicationUser;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * ホーム画面
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = Auth::user();
        if (empty($user->application_user)) {
            $applications_users = [];
        } else {
            $applications_users = $user->application_user;;
        }

        $recent_applications = DB::table('application_user')
        ->join('applications', 'application_user.application_id', '=', 'applications.id')
        ->orderBy('application_user.created_at', 'desc')
        ->take(4)
        ->get();

        $manyreview_applications = DB::table('application_user')
        ->join('applications', 'application_user.application_id', '=', 'applications.id')
        ->select(DB::raw('count(*) as application_count, application_id,trackId ,trackName, artistName, artworkURL512'))
        ->groupBy('application_id', 'trackName', 'artistName', 'artworkURL512')
        ->orderBy('application_count', 'desc')
        ->take(4)
        ->get();

        $manyfollower_users = DB::table('users')
        ->join('follows', 'users.id', '=', 'follows.followee_id')
        ->select(DB::raw('count(*) as follwer_count, users.id ,users.name,users.path'))
        ->groupBy('users.id', 'users.name')
        ->orderBy('follwer_count', 'desc')
        ->take(10)
        ->get();


        // applicationsに平均値を持たせておこう
        // git戻し作業
        $applications = ApplicationUser::all();
        $register_users = User::all();

        return view('home', compact('applications','user', 'applications_users', 'register_users','manyreview_applications', 'recent_applications', 'manyfollower_users'));
    }
}
