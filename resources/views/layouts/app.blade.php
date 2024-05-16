<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')

    <title>Mon Blog</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Montserrat:400,600&display=swap" rel="stylesheet" />
    @yield('css')
</head>

<body>
    @include('layouts.nav')
    <div class="relative selection:text-white">
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            @yield('content')
        </div>
    </div>
    @yield('scripts')
</body>
</html>
