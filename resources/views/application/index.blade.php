@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h3 class="text-white">アプリ・サービス名から探す</h3>
            <form method="GET" action="{{ route('application.index') }}" class="form-control-lg form-inline">
                <div class="input-group input-group-lg col-md-8">
                    <input class="form-control" name="search" type="search" placeholder="例) Slack,Trelloなど" aria-label="Search" value={{ $search }}>
                </div>
                <div class="input-group input-group-lg col-md-2">
                    <button class="btn btn-outline-success" type="submit">検索</button>
                </div>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                @foreach ($applications['results'] as $application)
                    <hr color="#797979">
                    @include('application.card')
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection
