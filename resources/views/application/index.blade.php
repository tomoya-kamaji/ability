@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">アプリ検索</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="GET" action="{{ route('application.index') }}" class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" bname="search" type="search" placeholder="検索" aria-label="Search" value={{ $search }}>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索する</button>
                    </form>

                    @foreach ($posts['results'] as $result)
                        @if(($loop->iteration - 1) % 4 == 0 || $loop->first)
                            <div class="card-deck p-2">
                        @endif
                            @include('application.card')
                        @if($loop->iteration % 4 == 0 || $loop->last)
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
