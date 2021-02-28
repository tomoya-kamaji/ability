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
                        <div class="input-group input-group-lg col-md-2">
                            <select class="form-control" name="reviw" type="search" placeholder="例) Slack,Trelloなど" aria-label="Search" value="">
                                <option>☆4以上</option>
                                <option>☆3以上</option>
                                <option>☆2以上</option>
                                <option>☆1以上</option>
                            </select>
                        </div>
                        <div class="input-group input-group-lg col-md-2">
                            <button class="btn btn-outline-success" type="submit">検索</button>
                        </div>
                    </form>

                    <div class="row align-items-center" style="height:200px">
                        <div class="col align-self-end">
                            <h3 class="text-white">オススメのアプリ</h3>
                            <p class="text-white">レビューを投稿したアプリに沿ってあなたのオススメが見つかる</p>
                        </div>
                        <div class="col align-self-end">
                            <h3 class="text-white">目的にあったアプリ</h3>
                            <p class="text-white">あなたの目的に沿ったアプリを探せる</p>
                        </div>
                        <div class="col align-self-end">
                            <h3 class="text-white">人気ユーザのアプリ</h3>
                            <p class="text-white">人気のユーザが使用したアプリを閲覧できる</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card bg-white shadow" style="width: 18rem;">
                    {{-- <img class="d-block mx-auto img-thumbnail mt-3" src={{ $application['artworkUrl512']}} width="150" height="150"> --}}
                    <div class="card-body">
                        {{ $user }}
                        <h4 class="card-title text-center">{{ $user->name }}</h4>
                        <hr color="#797979">
                        <p style="display: -webkit-box; -webkit-line-clamp: 7; -webkit-box-orient: vertical; overflow: hidden;"></p>
                        <a href="">詳細はこちら</a>
                        <hr color="#797979">
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card bg-white shadow" style="width: 100%;">
                    <h4 class="mt-4 ml-4 mb-0">最近のレビュー</h4>
                    <div class="row">
                        @foreach ($recent_applications as $recent_application)
                            @include('recent_application')
                        @endforeach
                    </div>
                </div>

                <div class="card mt-5 bg-white shadow" style="width: 100%;">
                    <h4 class="mt-4 ml-4 mb-0">レビューが多いアプリ</h4>
                    <div class="row">
                        @foreach ($manyreview_applications as $manyreview_application)
                            @include('manyreview_application')
                        @endforeach
                    </div>
                </div>

                <div class="card mt-5 bg-white shadow" style="width: 100%;">
                    <h4 class="mt-4 ml-4 mb-0">評価が高いアプリ</h4>
                    <div class="row">
                        @foreach ($manyreview_applications as $manyreview_application)
                            @include('manyreview_application')
                        @endforeach
                    </div>
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
