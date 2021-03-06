<footer>
    <div style="background-color: #3578ac; color: #fff;">
        <div class="container">
            <div class="row">
                <div class="col align-self-center">
                    <a href="{{ url('/home')}}">
                        <img src="{{ asset('/image/Ability.png') }}" class ="mx-auto rounded" width="150" height="90" style="object-fit: cover;">
                    </a>
                </div>
                <div class="col align-self-center mt-3">
                    <h3>Contact</h3>
                    <dl>
                        <a class="text-white" href="mailto:tomoya.kamaji@gmail.com?subject=Abilityについての問い合わせ" target="_blank"><dd><i class="far fa-envelope"> メール</i></dd></a>
                        <a class="text-white" href="https://twitter.com/tomoya_sakusaku/" target="_blank"><dd><i class="fab fa-twitter"> ツイッター</i></dd></a>
                        <a class="text-white" href="https://qiita.com/tomoya_sakusaku" target="_blank"><dd><i class="fas fa-search"> Qiita</i></dd></a>
                    </dl>
                </div>
                <div class="col align-self-center mt-5">
                    <dl>
                        <a class="text-white" href="{{ url('/home')}}"><dd>ホーム</dd></a>
                        <a class="text-white" href="{{ route("users.show", ["name" => Auth::user()->name]) }}"><dd>マイページ</dd></a>
                        <a class="text-white" href="{{ route('logout') }}"><dd>ログアウト</dd></a>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright text-center">
        Copyright 2021 tomoya_kamaji All Rights Reserved.
    </div>
</footer>

@section('css')
    <style>
    </style>
@endsection
