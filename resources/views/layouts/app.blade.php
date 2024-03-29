<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <title>{{ config('app.name') }} | {{ $title }}</title>
    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="{{ $background }}">
    @includeWhen(Route::currentRouteName() !== 'login', 'partials/navbar')
    @yield('content')
</body>

</html>
