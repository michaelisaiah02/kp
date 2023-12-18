<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

<body class="bg-dark-4">
    @include('admin.partials.header')
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div id="sidebar" class="col-2 text-white bg-dark-3 vh-100">
                @include('admin.partials.sidebar')
            </div>
            <div class="col col-md-10 col-xxl text-white d-flex align-items-center h-100" id="contentValins">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
