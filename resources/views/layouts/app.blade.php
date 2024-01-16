<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
            @if(session('success'))
                <div id="success-message" class="fixed top-0 right-0 m-4 bg-green-500 text-white p-4 rounded-md flex items-center justify-between">
                    <span>{{ session('success') }}</span>
                    <button id="close-success" class="text-white focus:outline-none">x</button>
                </div>
            @elseif(session('error'))
                <div id="error-message" class="fixed top-0 right-0 m-4 bg-red-500 text-white p-4 rounded-md flex items-center justify-between">
                    <span>{{ session('error') }}</span>
                    <button id="close-error" class="text-white focus:outline-none">x</button>
                </div>
            @endif
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
<script type="module">
    $(document).ready(function() {
        function closeNotification(notificationId) {
            $(notificationId).fadeOut('slow');
        }

        var successMessage = $('#success-message');
        var errorMessage = $('#error-message');

        if (successMessage.length) {
            successMessage.fadeIn('slow');
            $('#close-success').click(function() {
                closeNotification('#success-message');
            });
            setTimeout(function() {
                closeNotification('#success-message');
            }, 5000);
        }
        if (errorMessage.length) {
            errorMessage.fadeIn('slow');
            $('#close-error').click(function() {
                closeNotification('#error-message');
            });
            setTimeout(function() {
                closeNotification('#error-message');
            }, 5000);
        }
    });
</script>
