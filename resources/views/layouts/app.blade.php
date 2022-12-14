<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
        <script src="{{ asset('js/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('js/vendor/jquery-ui/jquery-ui.min.js') }}"></script>
        
        <!-- Styles -->
        <link href="{{ asset('vendor/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        @livewireStyles
    </head>
    <body class="h-full">
            @livewire('navegacion')
            
        @livewireScripts
    </body>
</html>
