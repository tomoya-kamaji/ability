@extends('layouts.app')

@section('content')
<div class="container">
    @include('users.user')
    {{-- 登録アプリといいね --}}
    <ul class="nav nav-tabs nav-justified mt-3">
        <li class="nav-item">
            <a class="nav-link text-muted" href="{{ route('users.show', ['name' => $user->name]) }}">
                登録アプリ
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-muted active" href="{{ route('users.show', ['name' => $user->name]) }}">
                いいね
            </a>
        </li>
    </ul>





    <mypage-tab></mypage-tab>

    @foreach($applications as $application)
    <div class="card mx-auto" style="width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
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
@endforeach

</div>
</div>
@endsection
