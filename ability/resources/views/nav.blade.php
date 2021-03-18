<header class="sticky-top">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-0">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home')}}">
                <img src="{{ asset('/image/Ability.png') }}" width="100" height="60" style="object-fit: cover;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('application.index') }}">アプリを探す<span class="sr-only">(current)</span></a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="">カテゴリ別</a>
                    </li> --}}
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link"　href="{{ route('login.guest') }}">ゲストログイン</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">会員登録</a>
                    </li>
                    @endif
                    @else

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("users.list") }}">ユーザ一覧</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("users.show", ["name" => Auth::user()->name]) }}">マイページ</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            {{-- <a class="dropdown-item" href="{{ route("users.show", ["name" => Auth::user()->name]) }}">マイページ</a> --}}
                            {{-- <div class="dropdown-divider"></div> --}}
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                                        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>

                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
