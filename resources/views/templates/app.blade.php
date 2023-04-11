<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script defer src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <title>@yield('title')</title>

    </head>
    <body class="antialiased">
        @include('inc.header')
        <hr>
        @yield('content')

        @include('inc.footer')

    @stack('script')
    </body>
</html>
