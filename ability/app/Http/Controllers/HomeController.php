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
        $applications = ApplicationUser::all();
        $register_users = User::all();

        if (!empty($user->application_user)) {
            //ユーザIDからアプリを取得
            $applications_usersarr = $applications_users->toArray();
            $application_id1 = array_column($applications_usersarr, 'id');
            $register_users = User::all();
            $jaccard = [];
            foreach ($register_users as $register_user) {
                //自分以外
                if ($user->id != $register_user->id) {
                    $application_id2 = array_column($register_user->application_user->toArray(), 'id');
                    /*
                        和集合
                        積集合
                        ジャッジカード指数 = 和集合 / 積集合
                    */
                    $application_union = array_union($application_id1, $application_id2);
                    $application_intersect = array_intersect($application_id1, $application_id2);
                    $jaccardindex = count($application_intersect) / count($application_union);
                    $jaccardindex = array($register_user->id, $jaccardindex);
                    array_push($jaccard, $jaccardindex);
                }
            }
            // ジャッジカード指数が最大を抽出
            $high_correlation_user = collect($jaccard)->where('1', collect($jaccard)->max(1))->all();
            // 相関が高いユーザを取得
            $high_correlation_user = User::where('id', array_shift($high_correlation_user)[0])->get();
            $application_id3 = array_column($high_correlation_user[0]->application_user->toArray(), 'id');
            //オススメアプリのID
            $recommended_applicationsid = array_diff($application_id1, $application_id3);
        }
        //オススメのアプリ
        $recommended_applications = DB::table('applications')
        ->select('*')
        ->where('id', $recommended_applicationsid)
        ->take(4)
        ->get();
        
        $applications = ApplicationUser::all();
        $register_users = User::all();

        return view('home', compact('applications','user', 'applications_users', 'register_users','manyreview_applications', 'recent_applications', 'manyfollower_users'));
    }
}
