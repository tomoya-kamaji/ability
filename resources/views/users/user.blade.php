<div class="card mt-3">
    <div class="card-body">
        <div class="d-flex flex -row">
            <div class ="col-md-2">
                @if ($is_image)
                <figure>
                    <img src="/storage/profile_images/{{ $user->id }}.jpg" class="rounded-circle" width="100px" height="100px">
                </figure>
                @endif
                @if (!$is_image)
                <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                    <i class="fas fa-user-circle fa-3x"></i>
                </a>
                @endif
            </div>
            <div class="col-md-3">
                <h2>{{ $user->name }}</h2>
                <a href="" class="text-muted">{{ $user->count_followings }} フォロー</a>
                <a href="" class="text-muted">{{ $user->count_followers }} フォロワー</a>
            </div>
            <div class="col-md-5">
                <h4>職業：エンジニア</h4>
                <h4>年代：20~25才</h4>
            </div>
            <div class="col-md-2">
                @if( Auth::id() !== $user->id )
                <follow-button
                    class="ml-auto"
                    :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                    :authorized='@json(Auth::check())'
                    endpoint="{{ route('users.follow', ['name' => $user->name]) }}">
                </follow-button>
                @endif
            </div>
        </div>
    </div>

</div>
