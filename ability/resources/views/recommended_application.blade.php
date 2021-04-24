<div class="col-md-3">
    <div class="card-body bg-white shadow">
        <a href="{{ route('application.detailpage', ['id' => $recommended_application->trackId]) }}"><img class="d-block mx-auto img-thumbnail m-3 shadow-sm" src={{ $recommended_application->artworkURL512 }} width="125" height="125"></a>
        <a href="{{ route('application.detailpage', ['id' => $recommended_application->trackId]) }}">
            <h5 class="card-title text-center m-0" style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;">{{ $recommended_application->trackName }}</h5></a>
    </div>
</div>
