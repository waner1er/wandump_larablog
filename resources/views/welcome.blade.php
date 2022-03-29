<x-guest-layout>
    @slot('header')
        <h2>
            {{ __('Bienvenue ') }}
        </h2>
    @endslot    @auth
        <a href="{{ url('/dashboard') }}">Dashboard</a>
    @else
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @endauth
</x-guest-layout>
