<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://unpkg.com/react@16.8.6/umd/react.production.min.js"></script>
    <script src="https://unpkg.com/react-dom@16.8.6/umd/react-dom.production.min.js"></script>
    <link rel="stylesheet" href="{{asset('vendor/van-ons/laraberg/public/css/laraberg.css')}}">

    <script src="{{ asset('vendor/van-ons/laraberg/public/js/laraberg.js') }}"></script>
</head>
<body>

@include('layouts.navigation')

<!-- Page Heading -->
<header>
    {{ $header }}
</header>

<!-- Page Content -->
<main>
    {{ $slot }}

</main>

</body>
</html>
