<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Simple Blog Website') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app" class="bg-white">
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            @include('layouts.partials.navbar')
        </nav>

        <main>
            @yield('content')
        </main>

        <footer class="bg-light">
            @include('layouts.partials.footer')
        </footer>
    </div>
</body>
</html>
