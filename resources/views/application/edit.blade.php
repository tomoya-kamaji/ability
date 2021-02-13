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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <h2>レビュー</h2>

        </div>
        <div class="col-md-9">
            <form method="POST" action="{{ route('application.register') }}">
                @csrf
                <h3>
                    <ins>あなたが利用する「{{ $application['trackName'] }}」についてお答えください</ins><br>
                </h3>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">オススメ度</label>
                    <select class="form-control" name='evaluation' id="exampleFormControlSelect1">
                        <option value="5">5：神</option>
                        <option value="4">4：すごくオススメ</option>
                        <option value="3">3：オススメ</option>
                        <option value="2">2：可もなく不可もなく</option>
                        <option value="1">1：オススメできない</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>レビュータイトル</label>
                    <input class="form-control input-lg" name="content" id="title" rows="3" placeholder="ex)使いやすい">
                    <small class="form-text text-muted">※必須</small>
                </div>
                <div class="form-group">
                    <label>レビュー</label>
                    <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3" placeholder="ex)使いやすい"></textarea>
                    <small class="form-text text-muted">マイページにて変更可能です。</small>
                </div>

                <input type="hidden" name="user_id" value={{ $user -> id }}></p>
                <input type="hidden" name="trackId" value={{ $application['trackId'] }}></p>
                <input type="hidden" name="artworkUrl512" value={{ $application['artworkUrl512'] }}></p>
                <input type="hidden" name="artistName" value={{ $application['artistName'] }}></p>
                <input type="hidden" name="trackName" value={{ $application['trackName'] }}></p>
                <button type="submit" class="btn btn-primary">登録</button>
            </form>
        </div>
    </div>
    @endsection
