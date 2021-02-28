<div class="col-md-3">
    <div class="card-body bg-white shadow">
        <a href="{{ route('application.detailpage', ['id' => $recent_application->trackId]) }}"><img class="d-block mx-auto img-thumbnail m-3 shadow-sm" src={{ $recent_application->artworkURL512 }} width="125" height="125"></a>
        <a href="{{ route('application.detailpage', ['id' => $recent_application->trackId]) }}"><h5 class="card-title text-center" style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;">{{ $recent_application->title }}</h5></a>
        <hr class="mb-2" color="#797979">
        <p style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;">{{ $recent_application->good_point }}</p>
    </div>
</div>
