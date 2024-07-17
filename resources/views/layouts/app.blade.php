<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite(['resources/css/app.css'])
    @yield('styles')
</head>

<body>
    <header>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-success shadow-sm ">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/recycling-8707519_1920.png') }}" style="width: 60px ; height: 60px;"
                            alt="">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">

                            <li class="nav-item"><a href="{{ route('map.show') }}"
                                    class="nav-link {{ Route::is('map.show') ? 'active' : 'text-white' }} ">Point De
                                    Depotoir</a></li>


                            <li class="nav-item"><a href="{{ route('typeAbonnements.select') }}"
                                    class="nav-link  {{ Route::is('typeAbonnements.select') ? 'active' : 'text-white' }} ">Abonnement</a>
                            </li>


                            <li class="nav-item"><a href="{{ route('apropos') }}"
                                    class="nav-link {{ Route::is('apropos') ? 'active' : 'text-white' }}  ">Apropos</a>
                            </li>


                            <li class="nav-item"><a href="{{ route('contact.form') }}"
                                    class="nav-link {{ Route::is('contact.form') ? 'active' : 'text-white' }}  ">Contact</a></li>

                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item border shadow-dark shadow-5">
                                        <a class="nav-link {{ Route::is('login') ? 'active' : 'text-white' }} "
                                            href="{{ route('login') }}">{{ __('Login / register') }}</a>
                                    </li>
                                @endif

                                {{-- @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link text-white"
                                            href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif --}}
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle border shadow-dark shadow-5"
                                        href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('home') }}">
                                            {{ __('Home') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            {{-- on affiche le carousel si et seulement si on est sur la vue welcome --}}
            @if (Route::is('index'))
                @include('components.carousel')
            @endif
    </header>

    <main class="py-4">
        @yield('content')
    </main>
    </div>
    @yield('footer')
    @yield('scripts')
</body>

</html>
