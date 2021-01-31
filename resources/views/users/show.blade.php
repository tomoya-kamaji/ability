@extends('layouts.app')

@section('content')
<div class="container">
    @include('users.user')
    <user-tab>
        
    </user-tab>

    @foreach($applications as $application)
        @include('users.card')
    @endforeach
</div>
</div>
@endsection
