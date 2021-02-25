@extends('layouts.app')

@section('content')
<?php $application = $applications['results'][0]; ?>

<div class="jumbotron p-2" style="background:url(images/bimg001.jpg); background-color: #3e68c9">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <img class="d-block mx-auto img-thumbnail" src={{ $application['artworkUrl512']}} width="150" height="150">
            </div>
            <div class="col-md-8 d-flex align-items-center">
                <h2 class="text-white">「{{ $application['trackName'] }}」のレビュー投稿</h2>
            </div>
        </div>
    </div>
</div>

@if(count($errors) > 0)
    <ul class="bg-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" >
            <form method="POST" action="{{ route('application.register') }}">
                @csrf
                {{-- <div class="p-3 mb-2 bg-gradient-primary text-white">.bg-gradient-primary</div> --}}
                <blockquote>
                    <p>あなたが利用する「{{ $application['trackName'] }}」についてお答えください</p>
                </blockquote>

                <hr color="#797979">

                <div class="row form-group">
                    <div class="col-sm-4">
                        <h5>オススメ度</h5>
                        <p>5点満点で評価ください</p>
                    </div>
                    <div class="col-sm-8">
                        <star-rating-input></star-rating-input>

                    </div>
                </div>

                <hr color="#797979">

                <div class="row form-group">
                    <div class="col-sm-4">
                        <h5>レビュータイトル</h5>
                        <p>30文字以内</p>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control input-lg" name="title" id="title" rows="3" placeholder="タイトル">
                        <small class="form-text text-muted">※必須</small>
                    </div>
                </div>

                <hr color="#797979">

                <div class="row form-group">
                    <div class="col-sm-4">
                        <h5>サービスの良いところ</h5>
                    </div>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="good_point" rows="8" placeholder="ex)使用したメリット、改善点など"></textarea>
                        <small class="form-text text-muted">マイページにて変更可能です。</small>
                    </div>
                </div>

                <hr color="#797979">

                <div class="row form-group">
                    <div class="col-sm-4">
                        <h5>サービスの改善点</h5>
                    </div>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="improvement_point" rows="8" placeholder="ex)使用したメリット、改善点など"></textarea>
                        <small class="form-text text-muted">マイページにて変更可能です。</small>
                    </div>
                </div>
                <input type="hidden" name="user_id" value={{ $user -> id }}>
                <input type="hidden" name="trackId" value={{ $application['trackId'] }}>
                <input type="hidden" name="artworkUrl512" value={{ $application['artworkUrl512'] }}>
                <input type="hidden" name="artistName" value={{ $application['artistName'] }}>
                <input type="hidden" name="trackName" value={{ $application['trackName'] }}>
                <button type="submit" class="btn btn-primary">登録</button>
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
        background: #dfebf7;
        color: #555;
        border-radius: 5px;
        border-left: 3px solid blue;

        /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.10);; */
    }
    blockquote p {
        padding: 0;
        margin: 5px 0;
        font-size: 1.5em;
        line-height: 1.7;
    }
</style>
@endsection
