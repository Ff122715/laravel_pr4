<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


{{--        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">--}}
        <link rel="stylesheet" href="{{ asset('css/imgs.css') }}">
{{--        <script defer src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>--}}
        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

        <script defer src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script defer src="{{ asset('js/dashboard.js') }}"></script>

        <title>@yield('title')</title>

    </head>
    <body class="antialiased">
        @include('inc.admin.header')
        @yield('content')
        <hr>
        @include('inc.footer')

    @stack('script')

        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="../../../../../../Users/Admin/Desktop/bootstrap-5.0.2-examples/dashboard/dashboard.js"></script>
    </body>
</html>
