<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SiDamen')</title>
    <link rel="icon" href="{{ asset('img/logo Sidamen.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Press+Start+2P&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js']) @yield('styles') </head>
<body>
    @yield('content')
    @yield('scripts') </body>
</html>