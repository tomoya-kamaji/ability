{{-- <div class="card deck col-md-10 center mx-auto">
    <div class="row">
        <div class="col-md-2 d-flex align-items-center">
            <img src={{ $result['artworkUrl512']}} class="d-block mx-auto" width="100" height="100">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $result['trackName']}}</h5>
                <p class="card-text">{{ $result->pivot['content']}}</p>
            </div>
        </div>
    </div>
</div> --}}



<div class="card border-0">
    <div class="row no-gutters">
        <div class="col-md-4 my-auto">
            <img class="d-block mx-auto" src={{ $result['artworkUrl512']}} width="150" height="150">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <div class="row">
                    <h5 class="card-title col-md-9">{{ $result['trackName']}}</h5>
                    <a href="{{ route('application.edit', ['id' => $result['trackId']]) }}" class="btn btn-primary col-md-3">レビュー</a>
                </div>
                <hr color="#797979">
                <p>ここにはアプリの説明が入ります</p>
                <p>アプリの詳細について</p>
            </div>
        </div>
    </div>
</div>
