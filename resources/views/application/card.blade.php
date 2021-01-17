

    <div class="card">
        <img class="card-img-top" src={{ $result['artworkUrl512'] }} alt="写真">
        <title>{{ $result['trackName'] }}</title>

        <div class="card-body" style="background-color:#e4f0f2">
            <h5 class="card-title">{{ $result['trackName'] }}</h5>
        </div>
        <div class="card-footer">
            <a href="" class="btn btn-success btn-sm">♡<span class="badge">3</span></a>
            <a href="" class="btn btn-success btn-sm">コメント<span class="badge">3</span></a>
            <a href="{{ route('application.edit', ['id' => $result['trackId']]) }}" class="btn btn-primary">登録</a>

        </div>
    </div>
