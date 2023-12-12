@extends('layouts.master')

@section('top')

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

@endsection

@section('body')

    <div id="app">

        @yield('main')

    </div>

@endsection

@section('bottom')

    <link rel="preload" href="sw.js" as="script">
    @yield('scripts')
    @livewireScripts()

@endsection
