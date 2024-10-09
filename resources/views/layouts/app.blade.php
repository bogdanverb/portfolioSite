<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            background-color: #343a40; /* Темний фон для тіла */
            color: white; /* Білий текст */
        }
        .navbar {
            background-color: #212529; /* Темний фон для навігації */
            padding: 10px; /* Відступи навігаційного бару */
        }
        .navbar-container {
            width: 80%; /* Зменшена ширина контейнера навігаційного бару */
            margin: 0 auto; /* Центрування навігаційного бару */
            display: flex;
            justify-content: space-between; /* Вирівнювання елементів по краях */
            align-items: center; /* Центрування елементів по вертикалі */
        }
        .navbar-nav {
            display: flex; /* Зміна на flex для навігаційного меню */
            justify-content: flex-end; /* Вирівнювання елементів навігаційного меню вправо */
            align-items: center; /* Центрування елементів по вертикалі */
            flex-grow: 1; /* Дозволяє елементам займати доступний простір */
        }
        .navbar-nav .nav-link {
            color: white; /* Білий текст для посилань */
            padding: 10px 15px; /* Відступи для посилань */
        }
        .navbar-nav .nav-link:hover {
            color: #17a2b8; /* Колір для посилань при наведенні */
        }
        .dropdown-menu {
            background-color: #212529; /* Темний фон для випадаючого меню */
        }
        .dropdown-item {
            color: white; /* Білий текст для пунктів меню */
        }
        .dropdown-item:hover {
            background-color: #17a2b8; /* Колір для пунктів меню при наведенні */
            color: black; /* Чорний текст при наведенні */
        }
        main {
            padding: 20px; /* Додано відступи для основного контенту */
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="navbar-container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <!-- Залиште це місце порожнім, якщо не потрібно додавати додаткові елементи -->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
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
            @yield('content')
        </main>
    </div>
</body>
</html>
