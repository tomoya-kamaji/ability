@extends('layouts.app')

@section('content')
<div class="bg-light">
    <div class="container-xl">
        @include('users.user')
        <user-tab
            :applications="{{ json_encode($applications) }}"
            :like_applications="{{ json_encode($like_applications) }}"
            :followers="{{ json_encode($followers) }}"
            :followings="{{ json_encode($followings) }}"
            :user="{{ json_encode($user) }}"
            :authorized='@json(Auth::check())'
        >
        </user-tab>
    </div>
</div>
@endsection
