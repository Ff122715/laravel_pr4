<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ asset('css/imgs.css') }}">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

        <script defer src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script defer src="{{ asset('js/dashboard.js') }}"></script>

        <title>@yield('title')</title>

    </head>

    <body class="antialiased">
        @yield('content')

    @stack('script')

    </body>
</html>
