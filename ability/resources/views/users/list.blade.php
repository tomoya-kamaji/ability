@extends('layouts.app')
@section('content')

<div class="jumbotron p-2">
    <div class="container">
        <div class="row">
            <h2 class="text-white m-5">ユーザ一覧</h2>
        </div>
    </div>
</div>

<div class="container mb-5">
    <div class="row mt-3">
        <div class="col-md-3 shadow p-3 mb-5 bg-white rounded">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h4 class="card-title text-center">
                        昇順
                    </h4>
                    <p class="card-text text-center m-0">

                    </p>
                    <div class="col d-flex align-items-center justify-content-center">

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            @foreach($users as $user)
            {{-- @for ($i = 0; $i < 3; $i++) --}}
                @include('users.user')
                {{-- <div class="card mt-3">
                    <div class="card-body">
                        <div class="d-flex flex -row">
                            <div class="col-md-2">
                                @if (false)
                                @else
                                <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                                    <i class="fas fa-user-circle fa-3x"></i>
                                </a>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <h2>{{ $user->name }}</h2>
                                <a href="" class="text-muted">{{ $user->count_followings }} フォロー</a>
                                <a href="" class="text-muted">{{ $user->count_followers }} フォロワー</a>
                            </div>
                            <div class="col-md-5">
                                <h4>職業：{{ $user->profession }}</h4>
                            </div>
                            <div class="col-md-2">
                                @if( Auth::id() !== $user->id )
                                    <follow-button class="ml-auto"
                                        :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                                        :authorized='@json(Auth::check())'
                                        endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
                                    >
                                    </follow-button>
                                @else

                                @endif
                            </div>
                        </div>
                    </div>
                </div> --}}
            @endforeach
            {{-- @endfor --}}
        </div>
    </div>
</div>

@endsection
@section('css')
<style>
    .btn {
        display: inline-block;
    }

    @media (min-width: 1200px) {
        .container {
            max-width: 1240px;
        }
    }

    .jumbotron {
        background-image: url("{{ asset('/image/reviesbackground.jpeg') }}");
        background-repeat: no-repeat;
        background-size: cover;
        }

    blockquote {
        position: relative;
        padding: 0px 0px 0px 5px;
        box-sizing: border-box;
        font-style: italic;
        background: #ffffff;
        color: black;
        border-radius: 5px;
    }

    blockquote p {
        padding: 0;
        margin: 5px 0;
        font-size: 1.0em;
        line-height: 1.7;
    }
</style>
@endsection
