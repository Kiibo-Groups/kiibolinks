<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $app->title }} - {{__('Your Link Management in one place')}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/toastify.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/aos.js') }}" ></script>
    <script src="{{ asset('splide/splide.min.js') }}"></script>
    <script src="{{ asset('js/fontawesome.js') }}" ></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css?v='.time()) }}">
    <link rel="stylesheet" href="{{ asset('css/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('splide/splide.min.css') }}">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!-- Development version -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>

    <!-- Production version -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
</head>

<?php
$user = auth()->user();
$SA = false;
if ($user) {
    $roleSA = $user->hasRole('SUPER-ADMIN');
    $editHome = request()->edithome;
    $SA = $roleSA && $editHome ? true : false;
}
?>

<body onscroll="getYPosition()">

    <div id="preloader">
        <div id="loader"></div>
    </div>
    @include('layouts.app_header')

    <main style="overflow-x: hidden !important;">
        @yield('content')
    </main>

    <script>
        AOS.init({
            once: true,
        });
    </script>
    <script src="{{ asset('js/app_header.js') }}"></script>
    <script src="{{ asset('js/utils.js') }}"></script>
</body>

</html>
