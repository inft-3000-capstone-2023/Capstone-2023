<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>NETS</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ URL::asset('css/layout_style.css') }}" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    NETS
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
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

        <main class="py-4">
            <div>
                {{--                            <img src="/ClientNavIcons/HomeIcon.png" alt="..." class="img-thumbnail">--}}
                <ul class="nav flex-column" id="first_nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('clients.index')}}"><img id="navImg" src="/client_nav_icons/home1.png" alt="image"  class="img-thumbnail"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('events.index')}}"><img id="navImg" src="/client_nav_icons/calendar.png" alt="image" class="img-thumbnail"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><img id="navImg" src="/client_nav_icons/financial.png" alt="image" class="img-thumbnail"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><img id="navImg" src="/client_nav_icons/organization.png" alt="image" class="img-thumbnail"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#"><img id="navImg" src="/client_nav_icons/help.png" alt="image" class="img-thumbnail"></a>
                    </li>
                </ul>
            </div>
            <div>
                {{--                            <img src="/ClientNavIcons/HomeIcon.png" alt="..." class="img-thumbnail">--}}
                <ul class="nav flex-column" id="second_nav">
                    <li class="nav-item">
                        Current Event
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Basic Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tickets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Publish</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Customize</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Attendee</a>
                    </li>

                </ul>
            </div>
            @yield('content')
        </main>

    </div>
</body>
</html>
