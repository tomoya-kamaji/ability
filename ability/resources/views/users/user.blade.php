<div class="card mt-3">
    <div class="card-body">
        <div class="d-flex flex -row">
            <div class ="col-md-2">
                @if ($user->path)
                <figure>
                    <img src="{{ $user->path }}" class="rounded-circle d-block mx-auto" width="80px" height="80px">
                </figure>
                @else
                    <i class="fas fa-user-circle fa-3x d-flex align-items-center justify-content-center"></i>
                @endif

            </div>
            <div class="col-md-3">
                <h2>{{ $user->name }}</h2>
                <a href="{{ route("users.show", ["name" => $user->name]) }}" class="text-muted">{{ $user->count_followings }} フォロー</a>
                <a href="{{ route("users.show", ["name" => $user->name]) }}" class="text-muted">{{ $user->count_followers }} フォロワー</a>
            </div>
            <div class="col-md-5">
                <h4>職業：{{ $user->profession }}</h4>
            </div>
            <div class="col-md-2">
                @if( Auth::id() !== $user->id )
                    <follow-button
                        class="ml-auto"
                        :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                        :authorized='@json(Auth::check())'
                        endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
                    >
                    </follow-button>
                @else
                    <a href="{{ route('users.index') }}"  class="btn border bg-success text-white p-2">プロフィール編集</a>
                @endif
            </div>
        </div>
    </div>
</div>
