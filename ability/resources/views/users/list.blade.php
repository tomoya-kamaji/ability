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
                @include('users.user')
            @endforeach
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
