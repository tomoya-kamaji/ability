<div class="card border-0">
    <div class="row no-gutters">
        <div class="col-md-4 my-auto">
            <img class="d-block mx-auto" src={{ $application['artworkUrl512']}} width="150" height="150">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <div class="row">
                    <h5 class="card-title col-md-9">{{ $application['trackName']}}</h5>
                    <a href="{{ route('application.edit', ['id' => $application['trackId']]) }}" class="btn btn-primary col-md-3">レビュー</a>
                </div>
                <hr color="#797979">
                <p style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $application['description'] }}    </p>
                <p>レビューの１件目</p>
            </div>
        </div>
    </div>
</div>
