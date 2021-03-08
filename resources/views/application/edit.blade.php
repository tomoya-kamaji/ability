@extends('layouts.app')

@section('content')
<div class="jumbotron p-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <a href="{{ route('application.detailpage', ['id' => $application['trackId']]) }}"><img class="d-block mx-auto img-thumbnail" src={{ $application['artworkUrl512']}} width="150" height="150"></a>
            </div>
            <div class="col-md-8 d-flex align-items-center">
                <h2 class="text-white">「"{{ $application['trackName'] }}"」のレビュー投稿</h2>
            </div>
        </div>
    </div>
</div>



<div class="container bg-light">
    <div class="row justify-content-center">
        <div class="col-md-12" >
            <form method="POST" action="{{ route('application.register') }}">
                @csrf
                <blockquote>
                    <p>あなたが利用する「{{ $application['trackName'] }}」についてお答えください</p>
                </blockquote>

                <hr color="#797979">

                <div class="row form-group">
                    <div class="col-sm-3">
                        <h5>オススメ度</h5>
                        <p>5点満点で評価ください</p>
                    </div>
                    <div class="col-sm-1">
                        <h4><span class="badge badge-primary">必須</span></h4>
                    </div>
                    <div class="col-sm-8">
                        <star-rating-input>
                            
                        </star-rating-input>
                        @if ($errors->has('evaluation'))
                            @foreach($errors->get('evaluation') as $message)
                                <p class="text-danger"> {{ $message }} </p>
                            @endforeach
                        @endif
                    </div>
                </div>

                <hr color="#797979">

                <div class="row form-group">
                    <div class="col-sm-3">
                        <h5>レビュータイトル</h5>
                        <p>30文字以内</p>
                    </div>
                    <div class="col-sm-1">
                        <h4><span class="badge badge-primary">必須</span></h4>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control input-lg" name="title" id="title" rows="3" placeholder="タイトル">
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
                        <h5>サービスの良いところ</h5>
                        <p>300文字以内</p>
                    </div>
                    <div class="col-sm-1">
                        <h4><span class="badge badge-primary">必須</span></h4>
                    </div>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="good_point" rows="8" placeholder="ex)使用したメリットなど"></textarea>
                        @if ($errors->has('good_point'))
                            @foreach($errors->get('good_point') as $message)
                                <p class="text-danger"> {{ $message }} </p>
                            @endforeach
                        @endif
                    </div>
                </div>

                <hr color="#797979">

                <div class="row form-group">
                    <div class="col-sm-3">
                        <h5>サービスの改善点</h5>
                        <p>300文字以内</p>
                    </div>
                    <div class="col-sm-1">
                        <h5><span class="badge badge-secondary">任意</span></h5>
                    </div>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="improvement_point" rows="8" placeholder="ex)改善点など"></textarea>
                        @if ($errors->has('improvement_point'))
                            @foreach($errors->get('improvement_point') as $message)
                                <p class="text-danger"> {{ $message }} </p>
                            @endforeach
                        @endif
                    </div>
                </div>
                <input type="hidden" name="user_id" value="{{ $user -> id }}">
                <input type="hidden" name="trackName" value="{{ $application['trackName'] }}">
                <input type="hidden" name="trackId" value="{{ $application['trackId'] }}">
                <input type="hidden" name="artworkUrl512" value="{{ $application['artworkUrl512'] }}">
                <input type="hidden" name="artistName" value="{{ $application['artistName'] }}">
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
        background-image: url("{{ asset('/image/reviesbackground.jpeg') }}");
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
@endsection
