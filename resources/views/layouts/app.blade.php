<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Laravel') . ' API' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/core.css') }}" rel="stylesheet">
</head>
<body>

<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Apps</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/api">API</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    Twitter
                </span>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container footer px-5 py-4">
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <b>{{ config('app.name', 'Laravel') }}</b>
                    </div>
                    <div class="row pr-5 pt-2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel urna in arcu iaculis tempus.
                        Morbi sed metus in arcu molestie congue non a ligula. Nam egestas metus at felis pellentesque
                        dignissim. Sed nec massa dapibus, pulvinar augue sed, posuere ligula. Interdum et malesuada
                        fames ac ante ipsum primis in faucibus. Proin fermentum cursus neque, in commodo lectus feugiat
                        ullamcorper. Nulla ut imperdiet neque. Integer pharetra, magna non convallis vestibulum, odio
                        diam aliquet orci, id mattis magna ligula vitae ante.
                    </div>
                </div>

                <div class="col-2">
                    <div class="row">
                        <b>About</b>
                    </div>
                    <div class="row">
                        <a href="{{ route('home') }}">Main Page</a>
                    </div>
                </div>

                <div class="col-2">
                    <div class="row">
                        <b>Apps</b>
                    </div>
                    <div class="row">
                        <a href="#" class="disabled">Google Play</a>
                    </div>
                    <div class="row">
                        <a href="#" class="disabled">Apple Store</a>
                    </div>
                </div>

                <div class="col-2">
                    <div class="row">
                        <b>Platform</b>
                    </div>
                    <div class="row">
                        <a href=" {{ route('api') }}">API</a>
                    </div>
                    <div class="row">
                        <a href=" {{ route('types') }}">Types</a>
                    </div>
                    <div class="row">
                        <a href=" {{ route('methods') }}">Methods</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"></script>
</div>
</body>
</html>
