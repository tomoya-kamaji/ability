@extends('layouts.app')

@section('content')
<div class="container">
    @include('users.user')

    <user-tab
        :applications="{{ json_encode($applications) }}"
        :user="{{ json_encode($user) }}"
    >
    </user-tab>

    {{-- <application-like
        :initial-is-liked-by='@json($application->isLikedBy(Auth::user()))'
        :initial-count-likes='@json($application->count_likes)'
        :authorized='@json(Auth::check())'
        endpoint="{{ route('application.like', ['application' => $application]) }}">
    </application-like> --}}

</div>
@endsection
