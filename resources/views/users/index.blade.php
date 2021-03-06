@extends('layouts.app')
@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="jumbotron p-2">
    <div class="container">
        <div class="row justify-content-center">
            @if ($is_image)
                <figure>
                    <img src="/storage/profile_images/{{ Auth::id() }}.jpg" class="rounded-circle" width="120px" height="120px">
                </figure>
            @else
                <i class="fas fa-user-circle fa-3x"></i>
            @endif
        </div>
    </div>
</div>


<div class="container bg-light">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="POST" action="{{ route('application.register') }}">
                @csrf
                <blockquote>
                    <p>プロフィール編集</p>
                </blockquote>
                <hr color="#797979">
                <div class="row form-group">
                    <div class="col-sm-3">
                        <h5>プロフィール画像</h5>
                    </div>
                    <div class="col-sm-1">
                        <h4><span class="badge badge-secondary">任意</span></h4>
                    </div>
                    <div class="col-sm-8">
                        <input type="file" name="photo" id="photo">
                        @if ($errors->has('title'))
                        @foreach($errors->get('title') as $message)
                        <p class="text-danger"> {{ $message }} </p>
                        @endforeach
                        @endif
                    </div>
                </div>

                <hr color="#797979">
                <div class="row form-group">
                    <div class="col-sm-3">
                        <h5>名前</h5>
                    </div>
                    <div class="col-sm-1">
                        <h4><span class="badge badge-primary">必須</span></h4>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control input-lg" name="title" id="title" rows="3" placeholder="名前">

                        @if ($errors->has('title'))
                        @foreach($errors->get('title') as $message)
                            <p class="text-danger"> {{ $message }} </p>
                        @endforeach
                        @endif
                    </div>
                </div>
                <hr color="#797979">
                <div class="row form-group">
                    <div class="col-sm-3">
                        <h5>メールアドレス</h5>
                    </div>
                    <div class="col-sm-1">
                        <h4><span class="badge badge-primary">必須</span></h4>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control input-lg" name="title" id="title" rows="3" placeholder="xxx@ability.com">

                        @if ($errors->has('title'))
                        @foreach($errors->get('title') as $message)
                            <p class="text-danger"> {{ $message }} </p>
                        @endforeach
                        @endif
                    </div>
                </div>

                <hr color="#797979">

                <div class="row form-group">
                    <div class="col-sm-3">
                        <h5>職業</h5>
                        <p>30文字以内</p>
                    </div>
                    <div class="col-sm-1">
                        <h4><span class="badge badge-secondary">任意</span></h4>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control input-lg" name="title" id="title" rows="3" placeholder="職業">
                        @if ($errors->has('title'))
                            @foreach($errors->get('title') as $message)
                                <p class="text-danger"> {{ $message }} </p>
                            @endforeach
                        @endif
                    </div>
                </div>

                <hr color="#797979">

                <div class="container">
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary btn-lg">　　　送信　　　</button>
                    </div>
                </div>
                <hr color="#797979">
            </div>
        </form>
    </div>
</div>


{{-- <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="photo">
    <input type="submit">
</form>

@if ($is_image)
<figure>
    <img src="/storage/profile_images/{{ Auth::id() }}.jpg" class="rounded-circle" width="80px" height="80px">
</figure>
@else
<i class="fas fa-user-circle fa-3x"></i>
@endif --}}


<image-upload
>
</image-upload>


@endsection

@section('css')
<style>
    blockquote {
        position: relative;
        padding: 0px 0px 0px 15px;
        box-sizing: border-box;
        font-style: italic;
        /* background: #dfebf7; */
        color: #555;
        border-radius: 5px;
        border-left: 7px solid blue;

        /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.10);; */
    }

    blockquote p {
        padding: 0;
        margin: 5px 0;
        font-size: 1.5em;
        line-height: 1.7;
    }

    .jumbotron {
        background-image: none;
        background-color: #59d4f0;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
@endsection
