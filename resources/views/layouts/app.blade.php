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
        <wireui:scripts />
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
        <footer class="text-center text-gray-500 mt-4 pb-2">
            <p>This site is currently under development.</p>
            <p>Developed by <a href="https://github.com/KenPrz" target="_blank" class="text-blue-500">KenPrz</a> and <a href="https://github.com/0roc4n" target="_blank" class="text-blue-500">0roc4n</a>.</p>
        </footer>
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
<style>
    /* width */
    ::-webkit-scrollbar {
        width: 5px;
        height: 10px;
    }
    
    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1; 
    }
    
    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }
    
    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555; 
    }
    
    </style>