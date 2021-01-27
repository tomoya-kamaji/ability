@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <div class="d-flex flex -row">
                <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                    <i class="fas fa-user-circle fa-3x"></i>
                </a>
                @if( Auth::id() !== $user->id )
                <follow-button class="ml-auto" :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))' :authorized='@json(Auth::check())' endpoint="{{ route('users.follow', ['name' => $user->name]) }}">
                </follow-button>
                @endif
            </div>
            <h2 class="h5 card-title m-0">

            <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                {{ $user->name }}
            </a>
            </h2>
        </div>
        <div class="card-body">
            <div class="card-text">
                <a href="" class="text-muted">
                    {{ $user->count_followings }} フォロー
                </a>
                <a href="" class="text-muted">
                    {{ $user->count_followers }} フォロワー
                </a>
            </div>
        </div>

        {{-- 登録アプリといいね --}}
        <ul class="nav nav-tabs nav-justified mt-3">
            <li class="nav-item">
                <a class="nav-link text-muted active" href="{{ route('users.show', ['name' => $user->name]) }}">
                    登録アプリ
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-muted" href="">
                    いいね
                </a>
            </li>
        </ul>

        @foreach($applications as $application)
        <div class="card mx-auto" style="width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4" >
                    <img src={{ $application['artworkURL512']}} class="d-block mx-auto" width="100" height="100">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $application['trackName']}}</h5>
                        <p class="card-text">{{ $application->pivot['content']}}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6 mx-auto">
                    <div class="panel panel-default bootcards-file">
                        <div class="list-group">
                            <div class="list-group-item">
                                <a href="#">
                                    <div class="col-sm-1">
                                        <img src={{ $application['artworkURL512']}} width="100" height="100">
                                    </div>
                                </a>
                        <h4 class="list-group-item-heading">
                            <a href="#">
                                {{ $application['trackName'] }}
                            </a>
                          </h4>
                                <p class="list-group-item-text"><strong>PDF</strong></p>
                                <p class="list-group-item-text"><strong>1.5MB</strong></p>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="btn-group btn-group-justified">
                                <div class="btn-group">
                                    <button class="btn btn-default">
                                        <i class="fa fa-arrow-down"></i>
                                        Download
                                    </button>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-default">
                                        <i class="fa fa-star"></i>
                                        Save
                                    </button>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-default">
                                        <i class="fa fa-envelope"></i>
                                        Email
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="card">
                <img class="card-img-top" src={{ $application['artworkURL512'] }} alt="写真">
        <title>{{ $application['trackName'] }}</title>

        <div class="card-body" style="background-color:#e4f0f2">
            <h5 class="card-title">{{ $application['trackName'] }}</h5>
        </div>
        <div class="card-footer">
            <application-like>
            </application-like>
            <a href="{{ route('application.edit', ['id' => $application['trackId']]) }}" class="btn btn-primary">編集</a>
        </div>
    </div> --}}

    @endforeach

</div>
</div>
@endsection
