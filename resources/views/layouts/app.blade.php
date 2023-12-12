@extends('layouts.master')

@section('top')

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

    @yield('scripts')
    @livewireScripts()

@endsection
