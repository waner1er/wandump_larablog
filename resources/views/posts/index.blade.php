<x-guest-layout>
    @slot('header')
        <h2>
            {{ __('Archive des artciles') }}
        </h2>
    @endslot
    @if(!$posts->isEmpty())
        @foreach($posts as $post)
           <div data-expand-target>
               <h2>{{ $post->title }}</h2>
               <div>{!! $post->body !!}</div>
               <a href="{{ route('posts.show', ['post'=>$post->id]) }}" data-expand-link>eree</a>
           </div>
        @endforeach
    @else
        il n' y a pas enciore d'article ici
    @endif
</x-guest-layout>

