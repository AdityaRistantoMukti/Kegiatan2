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
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('layouts.nav')
        @include('flash::message')
        <div class="jumbotron" style="height: 300px; background-image: url('img/bg.jpg');
         background-size:cover; background-position:center; font-family: 'Montserrat', sans-serif; color:#808080; ">
            <div class="container">
                <div class="">
                    <h3>Event</h3>
                    <h1>SMK AL-BAHRI</h1>
                    <p >
                        Jl. Yon Armed 7 No.143, RT.003/RW.0086, <br> Cikiwul, Bantargebang, Kota Bks, Jawa Barat 17152
                    </p>
                </div>
            </div>
        </div>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>


