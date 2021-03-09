@extends('layouts.app')

@section('content')
<div class="bg-light pb-5 ">
    <div class="container-xl" style="min-height: 600px;">
        @include('users.user')
        <user-tab
            :applications="{{ json_encode($applications) }}"
            :edit_url="{{ json_encode(url('/application/edit')) }}"
            :delete_url="{{ json_encode(url('/application/delete')) }}"
            :like_applications="{{ json_encode($like_applications) }}"
            :user="{{ json_encode($user) }}"
            :authorized='@json(Auth::check())'
        >
        </user-tab>
    </div>
</div>
@endsection
