<div class="card deck col-md-10 center mx-auto">
    <div class="row">
        <div class="col-md-2 d-flex align-items-center">
            <img src={{ $result['artworkUrl512']}} class="d-block mx-auto" width="100" height="100">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $result['trackName']}}</h5>
                {{-- <p class="card-text">{{ $result->pivot['content']}}</p> --}}
            </div>
        </div>
    </div>
</div>
