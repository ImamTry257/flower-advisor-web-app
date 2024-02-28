<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Flower Advisor' }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        footer {
            width: 1024px;
            background-color: #305242;
        }
    </style>
</head>
<body class="position-relative">
    <div id="app" class="" style="max-width: 1024px; height: 100%;">

        @if ( !in_array(Route::current()->uri(), ['login', 'register']) )
        <nav class="navbar navbar-expand-md bg-success">
            <div class="container">
                <a class="navbar-brand text-white" href="https://apps.apple.com/us/app/floweradvisor-flowers-gift/id1185232807" target="_blank">
                    <img class="rounded" src="https://is1-ssl.mzstatic.com/image/thumb/Purple112/v4/34/1c/9e/341c9e52-5ffd-073a-96e3-86f428f02d06/AppIcon-1x_U007emarketing-0-7-0-0-85-220-0.png/434x0w.webp" alt="" width="30">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-white" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

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

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
        @endif

        <main class="py-4">
            @yield('content')
        </main>

        @if ( !in_array(Route::current()->uri(), ['login', 'register']) )
        <footer class="position-absolute start-0 bottom-0">
            <div class="footer col-12">
                <div class="container text-center py-3">
                    <span class="text-white">© {{ date('Y') }} All Rights Reserved</span>
                </div>
            </div>
        </footer>
        @endif
    </div>
</body>
</html>
