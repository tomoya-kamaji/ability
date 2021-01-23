@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ユーザ編集</div>
                <div class="card-body">
                    <!-- 重要な箇所ここから -->
                    <form action="" method="post">
                        @csrf
                        <p>ID: {{ $user->id }}</p>
                        <input type="hidden" name="id" value="{{ $user->id }}" />
                        <p>名前</p>
                        <input type="text" name="name" value="{{ $user->name }}" />
                        <p>メール</p>
                        <input type="text" name="email" value="{{ $user->email }}" /><br />
                        <input type="submit" value="更新" />
                    </form>
                    <!-- 重要な箇所ここまで -->
                    @foreach ($posts['results'] as $result)
                        @if(($loop->iteration - 1) % 4 == 0 || $loop->first)
                        <div class="card-deck p-2">
                            @endif
                            <div class="card">
                                <img class="card-img-top" src={{ $result['artworkUrl512'] }} alt="写真">
                                <title>{{ $result['trackName'] }}</title>
                                <div class="card-body" style="background-color:#e4f0f2">
                                    <h5 class="card-title">{{ $result['trackName'] }}</h5>
                                </div>
                                <div class="card-footer">
                                    <a href="" class="btn btn-success btn-sm">♡<span class="badge">3</span></a>
                                    <a href="" class="btn btn-success btn-sm">コメント<span class="badge">3</span></a>
                                </div>
                            </div>

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
