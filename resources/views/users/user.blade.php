<div class="card mt-3 border-primary">
    <div class="card-body">
        <div class="d-flex flex -row">

            @if ($is_image)
            <figure>
                <img src="/storage/profile_images/{{ $user->id }}.jpg" class="rounded-circle" width="100px" height="100px">
                <figcaption>現在のプロフィール画像</figcaption>
            </figure>
            @endif

            @if (!$is_image)
            <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                <i class="fas fa-user-circle fa-3x"></i>
            </a>
            @endif

            @if( Auth::id() !== $user->id )
            <follow-button class="ml-auto" :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))' :authorized='@json(Auth::check())' endpoint="{{ route('users.follow', ['name' => $user->name]) }}">
            </follow-button>
            @endif
        </div>
        <h2 class="h5 card-title m-0">
            <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                {{ $user->name }}
            </a>
            </h2>
    </div>
    <div class="card-body">
        <div class="card-text">
            <a href="" class="text-muted">
                {{ $user->count_followings }} フォロー
            </a>
            <a href="" class="text-muted">
                {{ $user->count_followers }} フォロワー
            </a>
        </div>
    </div>
</div>
