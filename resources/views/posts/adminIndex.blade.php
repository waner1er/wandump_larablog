<x-app-layout>
    @slot('header')
        <h2>
            {{ __('posts.list') }}
        </h2>
    @endslot
    @foreach ($posts as $post)
            <div style="border: 1px solid #016a55; padding: 1rem">
                <h2>{{$post->title}}</h2>
                {!! $post->description !!}
                <a href="{{route('posts.edit', ['post'=>$post])}}">editer</a>
            </div>
    @endforeach

</x-app-layout>
