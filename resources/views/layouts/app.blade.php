<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('pics/f1.png')}}" class="logo" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('posts.index')}}">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('races.index')}}">Races</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('events.index')}}">Events</a>
                            </li>
                        @endauth
                        <li class="nav-item">
                            <a class="nav-link" href="poradie.php">Poradie</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Tímy
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#"><img src="{{asset('pics/teams/alfa.png')}}" alt="">Alfa Romeo</a>
                                </li>
                                <li><a class="dropdown-item" href="#"><img src="{{asset('pics/teams/alpha.png')}}" alt="">AlphaTauri</a>
                                </li>
                                <li><a class="dropdown-item" href="#"><img src="{{asset('pics/teams/alpine.png')}}" alt="">Alpine</a>
                                </li>
                                <li><a class="dropdown-item" href="#"><img src="{{asset('pics/teams/aston.png')}}" alt="">Aston
                                        Martin</a></li>
                                <li><a class="dropdown-item" href="ferrari.php"><img src="{{asset('pics/teams/ferrari.png')}}" alt="">Ferrari</a>
                                </li>
                                <li><a class="dropdown-item" href="#"><img src="{{asset('pics/teams/haas.png')}}" alt="">Haas</a></li>
                                <li><a class="dropdown-item" href="#"><img src="{{asset('pics/teams/McLaren.png')}}" alt="">McLaren</a>
                                </li>
                                <li><a class="dropdown-item" href="#"><img src="{{asset('pics/teams/mercedes.png')}}" alt="">Mercedes</a>
                                </li>
                                <li><a class="dropdown-item" href="#"><img src="{{asset('pics/teams/redbull.png')}}" alt="">Red Bull</a>
                                </li>
                                <li><a class="dropdown-item" href="#"><img src="{{asset('pics/teams/wiliams.png')}}" alt="">Wiliams</a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main >
            @yield('content')
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</body>
</html>
