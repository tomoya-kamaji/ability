@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="GET" action="{{ route('application.create') }}">
                        <button type="submit" class="btn btn-primary">
                            新規登録
                        </button>
                    </form>

                    {{ $user -> name }}
                    @foreach ($posts['results'] as $result)


                        @if(($loop->iteration - 1) % 4  == 0 || $loop->first)
                        <div class="card-deck p-2">
                            @endif
                            <div class="card">
                                <img class="card-img-top" src={{ $result['artworkUrl512'] }} alt="写真">
                                    <title>{{ $result['trackName'] }}</title>

                                <div class="card-body" style="background-color:#e4f0f2">
                                    <h5 class="card-title">{{ $result['trackName'] }}</h5>
                                </div>
                                <div class="card-footer">
                                    {{-- <small class="text-muted">{{ $result['sellerName'] }}</small> --}}
                                    <a href="" class="btn btn-success btn-sm">♡<span class="badge">3</span></a>
                                    <a href="" class="btn btn-success btn-sm">コメント<span class="badge">3</span></a>
                                    <a href="" class="btn btn-primary">＋</a>
                                </div>
                            </div>

                            @if($loop->iteration % 4 == 0 || $loop->last)
                        </div>
                        @endif
                    @endforeach
                    <button type="button" class="btn btn-info rounded-circle p-0" style="width:4rem;height:4rem; position: fixed; bottom: 100px; right: 100px; ">＋</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
