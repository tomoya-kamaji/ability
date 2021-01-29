<div class="card">
    <img class="card-img-top" src={{ $result['artworkUrl512'] }} alt="写真">
    <title>{{ $result['trackName'] }}</title>

    <div class="card-body" style="background-color:#e4f0f2">
        <h5 class="card-title">{{ $result['trackName'] }}</h5>
    </div>
    <div class="card-footer">
        <application-like>
            :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))'
        </application-like>

        <a href="{{ route('application.edit', ['id' => $result['trackId']]) }}" class="btn btn-primary">+</a>

    </div>



</div>
