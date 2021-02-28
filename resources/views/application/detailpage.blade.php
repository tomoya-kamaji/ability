@extends('layouts.app')
@section('content')
<?php $application = $applications['results'][0]; ?>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-3 shadow p-3 mb-5 bg-white rounded">
            <div class="card" style="width: 18rem;">
                <img class="d-block mx-auto img-thumbnail mt-3" src={{ $application['artworkUrl512']}} width="150" height="150">
                <div class="card-body">
                    <h4 class="card-title text-center">{{ $application['trackName'] }}</h4>
                    <p class="card-text text-center m-0">{{ $application['artistName'] }}</p>
                    <div class="col d-flex align-items-center justify-content-center">
                        <star-rating-average
                            :average-reviews='{{ $application['averageReviews'] }}'
                        >
                        </star-rating-average>
                    </div>
                    <div class="col d-flex align-items-center justify-content-center m-2">
                        <i class="far fa-comment-dots" style="vertical-align: middle;"> {{ $application['countreviews']}}件</i>
                    </div>
                    <a href="{{ route('application.edit', ['id' => $application['trackId']]) }}" class="btn btn-primary mx-auto d-block">レビューを書く</a>
                    <hr color="#797979">
                    <p style="display: -webkit-box; -webkit-line-clamp: 7; -webkit-box-orient: vertical; overflow: hidden;">{{ $application['description'] }}</p>
                    <a href="{{ route('application.edit', ['id' => $application['trackId']]) }}">詳細はこちら</a>
                    <hr color="#797979">
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="jumbotron m-0">
            </div>
            

            <application-tab
                :application="{{ json_encode($application) }}"
                :applicationreviews="{{ json_encode($applicationreviews) }}"
                :user="{{ json_encode($user) }}"
                :authorized='@json(Auth::check())'>
            </application-tab>

        </div>
    </div>
</div>

@endsection
@section('css')
<style>
    .btn{
    display: inline-block;
    }
    @media (min-width: 1200px) {
        .container {
            max-width: 1240px;
        }
    }
    .jumbotron {
        background-image: url("{{ asset('/image/detailpage.jpeg') }}");
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
