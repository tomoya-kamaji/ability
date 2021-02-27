@extends('layouts.app')

@section('content')


<div class="container-xl">
    @include('users.user')
    <user-tab
        :applications="{{ json_encode($applications) }}"
        :user="{{ json_encode($user) }}"
        :authorized='@json(Auth::check())'
    >
    </user-tab>
</div>
@endsection
