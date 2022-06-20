<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BabyCare') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" style="position:relative;">
     <nav class="navbar navbar-dark bg-dark fixed-top" style="opacity:95%;height:80px">
        <a class="navbar-brand px-5 font-weight-bold" href="{{ url('/') }}">Baby Care</a>
            @if (Route::has('login'))
                <div class="">
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-warning m-3 my-sm-0">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary m-3 my-sm-0">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-warning m-3 my-sm-0">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </nav>
        <main class="py-4 ">
            @yield('content')
        </main>
    </div>
</body>
</html>
