@extends('layouts.app')

@section('content')
<div class="bg-light pb-5 ">
    <div class="container-xl">
        @include('users.user')
        {{-- {{ url('/application/detailpage') }} --}}
        <user-tab
            :applications="{{ json_encode($applications) }}"
            :like_applications="{{ json_encode($like_applications) }}"
            :user="{{ json_encode($user) }}"
            :authorized='@json(Auth::check())'
        >
        </user-tab>
    </div>
</div>
@endsection
