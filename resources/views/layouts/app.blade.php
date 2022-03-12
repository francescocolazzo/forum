<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Forum Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <label class="navbar-brand" class="d-none">
                    <a href="{{ route('topics.index') }}" style="color: #17a2b8;" >
                        @csrf
                        {{ __('Forum a caso') }}
                    </a>
                </label>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!-- Authentication Links -->
                        @guest
                            <ul class="navbar-nav ms-auto ">
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrazione') }}</a>
                                    </li>
                                @endif
                            </ul>
                        @else
                            <ul class="navbar-nav ml-auto">
                                @php //var_dump(Auth::user());@endphp
                                <li class="nav-item">
                                    <label class="nav-link"  style="font-size: 13px;padding: 14px 10px 0 0;">   {{ Auth::user()->username }} </label>
                                </li>
                                <li class="nav-item">
                                    <form class="navbar-brand" id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                        <button type="submit" class="btn btn-info btn-sm">
                                            {{ __('Logout') }}
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        @endguest

                </div>
            </div>
        </nav>

    </div>
</body>
</html>
