<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>

<body class="antialiased">
    @if (Route::has('login'))
        <div class="container">
            <div id="left-section" class="child">
                <h1>Header</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio impedit maiores illum non, pariatur, dolorum laboriosam animi at culpa soluta dolores amet aperiam veniam repellat odit perspiciatis quae nisi facilis?</p>
            </div>
            <div id="right-section" class="child">
                <div class="login-section">
                    @auth
                        <section class="welcome-text">
                            <h1>Welcome</h1>
                            <p>You are logged in!</p>
                        </section>
                        <a class="button login-router" href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <section class="welcome-text">
                            <h1>Welcome</h1>
                            <p>Please Login To Admin Dashboard</p>
                        </section>
                        <a class="button login-router" href="{{ route('login') }}">Log in</a>
                        @if (Route::has('register'))
                            <a class="button register-router" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    @endif
</body>

</html>
