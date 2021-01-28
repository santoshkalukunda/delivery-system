<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Closet Nepal Delivery System</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link type="image/x-icon" href="{{asset('assets/img/icon.png')}}" rel="shortcut icon" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
</head>

<boby>
    <nav class="navbar navbar-expand-lg d-flex">
        <div>
            <a class="navbar-brand" href="/">
                <img src="{{asset('assets/img/logo.png')}}" class="" width="140px" alt="closet Nepal Logo">
            </a>
        </div>
        <div class="ml-auto">
            <ul class="navbar-nav">
                <!-- Authentication Links -->
                @if (Route::has('login'))
                <div class="">
                    @auth
                    <a href="{{ url('/home') }}" class="text-sm  btn-sm btn-outline-primary badge-pill px-4">Home</a>
                    @else
                    <a href="{{ route('login') }}" class="text-sm btn-sm btn-outline-primary badge-pill px-4">Login</a>
                    @endauth
                </div>
                @endif
            </ul>
        </div>
    </nav>
    <main class="mt-3">
        @yield('content')
    </main>
    <div class="d-flex justify-content-center fixed-bottom py-1">
        <div class="font-13 text-dark">{{date('Y')}} © <a href="https://closetnepal.com.np" target="_blank"
                class="font-bold"><b>Closet Nepal</b></a> - All rights reserved. 
                {{-- Powered By : <a href="http://kalukunda.com.np" target="_blank" rel="noopener noreferrer"><b>Santosh
                    Kalukunda</b> --}}
                </a>
        </div>

    </div>
    </body>
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
    </script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js">
    </script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js">
    </script>

</html>