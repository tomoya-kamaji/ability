@extends('layouts.app')

@section('content')
<?php $result = $posts['results'][0]; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-5">
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="card">
                    <img class="card-img-top" src={{ $result['artworkUrl512'] }} alt="写真">
                    <title>{{ $result['trackName'] }}</title>

                    <div class="card-body" style="background-color:#e4f0f2">
                        <h5 class="card-title">{{ $result['trackName'] }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1">

        </div>
        <div class="col-md-6">
            <form method="POST" action="{{ route('application.register') }}">
                @csrf
                <div class="form-group">
                    <label>メモ</label>
                    <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3" placeholder="ex)使いやすい"></textarea>
                    <small class="form-text text-muted">マイページにて変更可能です。</small>
                </div>
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
                <input type="hidden" name="track_id" value={{ $result['trackId'] }}></p>
                <input type="hidden" name="user_id" value={{ $user -> id }}></p>
                <button type="submit" class="btn btn-primary">登録</button>
            </form>
        </div>
    </div>
    @endsection
