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

    {{-- No index --}}
    <meta name="robots" content="noindex">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles

    <style>
        .red{
            border: 3px solid red;
        }

        .blue{
            border: 3px solid blue;
            background-color: rgb(224, 150, 0);
        }

        .green{
            border: 3px solid green;
        }
    </style>
</head>
<body>
    <div id="app">
        @if (Auth::user() && Auth::user()->role->name == "Gerencia")
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background-color: rgb(7, 68, 138)!important;">
        @elseif (Auth::user() && Auth::user()->role->name == "Logística")
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background-color: rgb(245, 170, 20)!important;">
        @elseif (Auth::user() && Auth::user()->role->name == "Residente de obra")
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background-color: green!important;">
        @elseif (Auth::user() && Auth::user()->role->name == "Administrador de almacén")
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background-color: rgb(245, 170, 20)!important;"> 
        @else
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"> 
        @endif
    

            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}{{"( "}}{{ Auth::user()->role->name}}{{" )"}}
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

        <main class="py-4">
            @yield('content')
        </main>

        

    </div>
    @livewireScripts
    @yield('scripts')
</body>
</html>
