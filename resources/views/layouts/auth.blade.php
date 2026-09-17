<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="EGlabs">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title') | NewWave Motorsport</title>
    <link rel="icon" href="{{ asset('assets/frontend/images/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/brand-tokens.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
</head>
<body class="nw-auth">
    <main class="auth-shell">
        <a class="auth-brand" href="{{ route('home') }}" aria-label="NewWave Motorsport home">
            <img src="{{ asset('assets/frontend/images/newwavelogo.png') }}" alt="NewWave Motorsport" width="220">
        </a>
        <section class="auth-card" aria-labelledby="auth-title">
            <p class="auth-eyebrow">NEWWAVE / STAFF ACCESS</p>
            <h1 id="auth-title">@yield('title')</h1>
            <p class="auth-intro">@yield('intro')</p>
            @yield('content')
        </section>
        <a class="auth-back" href="{{ route('home') }}">Back to the website</a>
        <footer class="auth-footer">&copy; {{ date('Y') }} NewWave Motorsport. <span>Developed by <strong>EGlabs</strong>.</span></footer>
    </main>
</body>
</html>
