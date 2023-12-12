<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @yield('top')

        <meta name="theme-color" content="#ea3941"/>
        <meta name="description" content="Description of your app">
        <meta name="author" content="Author Name">
        <meta name="keywords" content="keyword1, keyword2, keyword3">
        
        <link rel="manifest" href="{{ asset('manifest.json') }}">
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
        <link rel="apple-touch-icon" href="{{ asset('logo.png') }}" type="image/png">
        
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @yield('styles')
        @livewireStyles()
        
    </head>

    <body>

        @yield('body')
        @yield('bottom')

        <link rel="preload" href="sw.js" as="script">
        @yield('scripts')
        @livewireScripts()

        <noscript>
            <strong>JavaScript is required for this web application to function properly.</strong>
        </noscript>

    </body>

</html>


