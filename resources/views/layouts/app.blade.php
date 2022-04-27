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
    <link href="{{ asset('css/basic.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="app" class="container-fluid">
        <div class="row min-vh-100 flex-column flex-md-row">
            <aside class="col-auto p-0 bg-dark flex-shrink-1">
                <nav class="navbar navbar-expand navbar-dark bg-dark flex-mid-column flex-row align-items-start py-2 ">
                    <div class="container collapse navbar-collapse">
                        <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                            <li class="nav-item">
                                <a class="navbar-brand text-warning" href="{{ url('/home') }}">
                                    Icon
                                </a>
                            </li>
                            <!-- Home -->
                            <li class="nav-item">
                                <a class="navbar-brand text-warning" href="{{ url('/home') }}">
                                    Home
                                </a>
                            </li>
                            <!-- Transactions -->
                            <li class="nav-item">
                                <a class="navbar-brand text-warning" href="{{ url('/transactions') }}">
                                    Transactions
                                </a>
                            </li>
                            <!-- Inventory -->
                            <li class="nav-item">
                                <a class="navbar-brand text-warning" href="{{ url('/Inventory') }}">
                                    Inventory
                                </a>
                            </li>
                            <!-- Dashboard -->
                            <li class="nav-item">
                                <a class="navbar-brand text-warning" href="{{ url('/Dashboard') }}">
                                    Dashboard
                                </a>
                            </li>
                            @guest
                            <!-- if no user is logged in, logout function is not visible -->
                            @else
                            <!-- if user is logged in, logout function is now visible -->
                                @if (Route::has('logout'))
                                    <li class="nav-item">
                                        <a class="navbar-brand text-warning" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @endif
                            @endguest


                        </ul>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                    </div>
                </nav>
            </aside>

            <main class="col bg-faded py-3 flex-grow-1">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
