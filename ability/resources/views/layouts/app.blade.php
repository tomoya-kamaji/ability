<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ability</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <!-- Styles -->
    <script src="https://unpkg.com/vue-star-rating/dist/star-rating.min.js"></script>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @yield('css')

</head>

<body>
    <div id="app">
        @include('nav')
            <script type="text/javascript">
                @if (session('msg_success'))
                    $(function () {
                        toastr.success('{{ session('msg_success') }}');
                    });
                @endif
                @if (session('msg_error'))
                    $(function () {
                        toastr.error('{{ session('msg_error') }}');
                    });
                @endif
            </script>
            @yield('content')
        @include('footer')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
