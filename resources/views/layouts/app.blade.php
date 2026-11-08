<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Beranda') - MeowInfo</title>
    <link rel="icon" href="{{ asset('images/logo.svg') }}" type="image/svg+xml">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=DM+Serif+Display&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    @stack('styles')
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    @isset($username)
        <x-navbar :username="$username" />
    @endisset

    @hasSection('fullscreen')
        @yield('fullscreen')
    @else
        @hasSection('wide')
            @yield('wide')
        @else
            <main class="container">
                @include('partials.alert')
                @yield('content')
            </main>
        @endif
        <x-footer />
    @endif
</body>
</html>