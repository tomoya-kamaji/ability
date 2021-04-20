<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // 追加
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{

    use AuthenticatesUsers {
        logout as performLogout;
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // logoutファンクションを作成
    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect('/home')->with('msg_error', 'ログアウトしました');
    }

    // ゲストユーザー用のユーザーIDを定数として定義
    private const GUEST_USER_ID = 1;

    // ゲストログイン処理
    public function guestLogin()
    {
        // id=1 のゲストユーザー情報がDBに存在すれば、ゲストログインする
        if (Auth::loginUsingId(self::GUEST_USER_ID)) {
            return redirect('/home')->with('msg_success','ゲストユーザでログインしました');
        }

        return redirect('/home');
    }


}
