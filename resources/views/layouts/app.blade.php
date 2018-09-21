<!DOCTYPE html>
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
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body * {
            font-family: 'Nunito', sans-serif;
            box-sizing: border-box;
            color: black;
        }

        #countdown-wrap {
            width: 100%;
            margin: 60px;
            text-align: center;
            font-family: arial;
            max-width: 650px;
        }

        #goal {
            font-size: 48px;
            text-align: right;
            color: #FFF;
            @media only screen and (max-width : 640px) {
                text-align: center;
            }

        }

        #glass {
            width: 100%;
            height: 20px;
            background: #c7c7c7;
            border-radius: 10px;
            float: left;
            overflow: hidden;
        }

        #progress {
            float: left;
            width: 16%;
            height: 20px;
            background: #FF5D50;
            z-index: 333;
        }

        .goal-stat {
            width: 10%;
            padding: 10px;
            float: left;
            margin: 0;
            color: #FFF;

            @media only screen and (max-width : 640px) {
                width: 50%;
                text-align: center;
            }
        }

        .goal-number, .goal-label {
            display: block;
        }

        .goal-number {
            font-weight: bold;
        }

        .circleWrapper {
            text-align: center;
            align-content: center;
        }

        .circleWrapper .circle {
            text-align: center;
            align-content: center;
        }

        .circle {
            width: 100px;
            height: 100px;
            background-color: white;
            border-radius: 100px;
            border: black solid 1px;
            display:inline-block;
            -o-transition:.5s;
            -ms-transition:.5s;
            -moz-transition:.5s;
            -webkit-transition:.5s;
            /* ...and now for the proper property */
            transition:.5s;
            cursor: pointer;
        }

        .circle:hover {
            background-color: #949494;
        }

        .circle img {
            margin: 30px;
            display:inline-block;
            vertical-align: middle;
            text-align: center;
            align-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
