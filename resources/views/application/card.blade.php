<div class="card border-0">
    <div class="row no-gutters">
        <div class="col-md-4 my-auto">
            <img class="d-block mx-auto" src={{ $application['artworkUrl512']}} width="150" height="150">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <div class="row">
                    <h3 class="card-title col-md-10">{{ $application['trackName']}}</h3>


                    <application-like
                        :initial-id='{{ $application['id']}}'
                        :application="{{ json_encode($application) }}"
                        :initial-is-liked-by='{{ json_encode($application['isLikedBy'])}}'
                        :initial-count-likes='{{ $application['countlikes']}}'
                        :initial-is-liked-by='false'
                        :authorized='@json(Auth::check())'

                        >
                    </application-like>

                    {{-- <application-like
                        :initial-is-liked-by='@json($application->isLikedBy(Auth::user()))'
                        :initial-count-likes='@json($application->count_likes)'
                        :authorized='@json(Auth::check())'
                        endpoint="{{ route('application.like', ['application' => $application]) }}">
                    </application-like> --}}
                </div>

                <hr color="#797979">
                <p style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $application['description'] }}    </p>

                <div class="row">
                    <p class="col-md-4">レビューの１件目</p>
                    <a href="{{ route('application.edit', ['id' => $application['trackId']]) }}" class="btn btn-primary col-md-2 offset-6">レビュー</a>
                </div>
            </div>
        </div>
    </div>
</div>
