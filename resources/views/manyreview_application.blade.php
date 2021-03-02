

<div class="col-md-3">
    <div class="card-body bg-white shadow">
        @if ($i == 0)
            <i class="fas fa-crown" aria-hidden="true" style="color:#DBB400;">　No.1</i>
        @elseif ($i == 1)
            <i class="fas fa-crown" aria-hidden="true" style="color:#AEB3B5;">　No.2</i>
        @elseif ($i == 2)
            <i class="fas fa-crown" aria-hidden="true" style="color:#BA6E40;">　No.3</i>
        @elseif ($i == 3)
            <i class="fas fa-crown" aria-hidden="true">　No.4</i>
        @endif
        <a href="{{ route('application.detailpage', ['id' => $recent_application->trackId]) }}"><img class="d-block mx-auto img-thumbnail m-3 shadow-sm" src={{ $manyreview_application->artworkURL512}} width="125" height="125"></a>
        <a href="{{ route('application.detailpage', ['id' => $recent_application->trackId]) }}">
            <h5 class="card-title text-center" style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;">{{ $manyreview_application->trackName}}</h5>
        </a>
        <i class="far fa-comment-dots text-center m-0">{{ $manyreview_application->application_count}}件</i>
    </div>
</div>
