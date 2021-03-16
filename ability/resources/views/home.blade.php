@extends('layouts.app')
@section('content')
<div class="bg-light">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron">
                <div class="container">
                    <div class="row">
                        <h1 class="text-white">ユーザーに評価された”本当に良いアプリ”に出会える！</h1>
                    </div>
                    <div class="row">
                        <hr class="my-4">
                    </div>
                    <form method="GET" action="{{ route('application.index') }}" class="form-control-lg form-inline" >
                        <div class="input-group input-group-lg col-md-8">
                            <input class="form-control" name="search" type="search" placeholder="例) Slack,Trelloなど" aria-label="Search" value="">
                        </div>
                        {{-- <div class="input-group input-group-lg col-md-2">
                            <select class="form-control" name="reviw" type="search" placeholder="例) Slack,Trelloなど" aria-label="Search" value="">
                                <option>☆4以上</option>
                                <option>☆3以上</option>
                                <option>☆2以上</option>
                                <option>☆1以上</option>
                            </select>
                        </div> --}}
                        <div class="input-group input-group-lg col-md-2">
                            <button class="btn bg-success text-white" type="submit">検索</button>
                        </div>
                    </form>

                    <div class="row align-items-center" style="height:200px">
                        <div class="col align-self-end">
                            <h3 class="text-white">オススメのアプリ</h3>
                            <p class="text-white">レビューを投稿したアプリに沿ってあなたのオススメが見つかる</p>
                        </div>
                        {{-- <div class="col align-self-end">
                            <h3 class="text-white">目的にあったアプリ</h3>
                            <p class="text-white">あなたの目的に沿ったアプリを探せる</p>
                        </div> --}}
                        <div class="col align-self-end">
                            <h3 class="text-white">人気ユーザのアプリ</h3>
                            <p class="text-white">人気のユーザがレビューアプリを閲覧できる</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="container">
                    <div class="row">
                        <div class="col text-center border-right">
                            <h3 class="m-0">{{ $applications->count() }}</h3>
                            <p>レビュー</p>
                        </div>
                        <div class="col text-center">
                            <h3 class="m-0">{{ $register_users->count() }}</h3>
                            <p>ユーザ</p>
                        </div>
                    </div>
                </div>
                {{-- ログインしてない --}}
                @guest
                    <div class="card mx-auto bg-white shadow mt-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5>会員登録/ログイン</h5>
                            <p class="text-secondary m-2">
                                ログインすると、Ability上でアプリを保存したり、レビューを記載することができます。
                            </p>
                            <a href="{{ route('register') }}" class="m-3">会員登録</a>
                            <a href="{{ route('login') }}" class="m-3">ログイン</a>
                        </div>
                    </div>

                {{-- ログイン時 --}}
                @else
                    <div class="card mx-auto bg-white shadow mt-3" style="width: 18rem;">
                        <div class="card-body">
                            <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                                <i class="fas fa-user-circle fa-3x d-flex align-items-center justify-content-center"></i>
                            </a>
                            <h4 class="card-title text-center">{{ $user->name }}</h4>
                            <hr color="#e6e6e6" class="m-2">
                            <div class="row">
                                <div class="col-md-8">
                                    <a href="{{ route("users.show", ["name" => Auth::user()->name]) }}" class="m-2">マイレビュー</a>
                                </div>
                                <div class="col-md-3">
                                    <p class="m-0 text-right">{{ $applications->count() }}</p>
                                </div>
                                <div class="col-md-1">
                                </div>
                            </div>
                            <hr color="#e6e6e6" class="m-2">
                            <div class="row">
                                <div class="col-md-8">
                                    <a href="{{ route("users.show", ["name" => Auth::user()->name]) }}" class="m-2">ブックマーク</a>
                                </div>
                                <div class="col-md-3">
                                    <p class="m-0 text-right">{{ $user->count_likes }}</p>
                                </div>
                                <div class="col-md-1">
                                </div>
                            </div>
                            <hr color="#e6e6e6" class="m-2">
                            <div class="row">
                                <div class="col-md-8">
                                    <a href="{{ route("users.show", ["name" => Auth::user()->name]) }}" class="m-2">フォロー中</a>
                                </div>
                                <div class="col-md-3">
                                    <p class="m-0 text-right">{{ $user->count_followings }}</p>
                                </div>
                                <div class="col-md-1">
                                </div>
                            </div>
                            <hr color="#e6e6e6" class="m-2">
                            <div class="row">
                                <div class="col-md-8">
                                    <a href="{{ route("users.show", ["name" => Auth::user()->name]) }}" class="m-2">フォロワー</a>
                                </div>
                                <div class="col-md-3">
                                    <p class="m-0 text-right">{{ $user->count_followers }}</p>
                                </div>
                                <div class="col-md-1">
                                </div>
                            </div>
                            <hr color="#e6e6e6" class="m-2">
                        </div>
                    </div>
                @endguest

                <div class="card mx-auto bg-white shadow mt-3" style="width: 18rem;">
                    <div class="row">
                        <h2>
                            人気のユーザ
                        </h2>
                        {{ $manyfollower_users }}
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                    <h2 class="mt-4 mb-3">新着のレビュー</h2>
                    <div class="row mb-5">
                        @foreach ($recent_applications as $recent_application)
                            @include('recent_application')
                        @endforeach
                    </div>

                    <h2 class="mt-5 mb-3">レビューが多いアプリ</h2>
                    <div class="row">
                        <?php $i = 0;?>
                        @foreach ($manyreview_applications as $manyreview_application)
                            @include('manyreview_application')
                            <?php $i++; ?>
                        @endforeach
                    </div>

                <div class="row mt-0 mb-5 justify-content-center bg-white shadow">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('css')
    <style>
        .container-fluid {
            margin-right: auto;
            margin-left: auto;
            max-width: 1480px;
        }
        .jumbotron {
            background-image: url({{ asset('/image/background.jpeg') }});
        }
    </style>
@endsection
