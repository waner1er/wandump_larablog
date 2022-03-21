<x-guest-layout>
    @slot('header')
        <h2>
            {{ __('Archive des artciles') }}
        </h2>
    @endslot
    @if(!$posts->isEmpty())
        @foreach($posts as $post)
            {{ $post->title }}
        @endforeach
    @else
        il n' y a pas enciore d'article ici
    @endif
</x-guest-layout>

