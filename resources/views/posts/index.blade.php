<x-guest-layout>
    @foreach ($posts as $post)
        <div style="border: 1px solid #016a55; padding: 1rem">
            <h2>{{$post->title}}</h2>
            {!! $post->description !!}
            <a href="{{route('posts.show', ['post'=>$post])}}">lire +</a>
        </div>
    @endforeach
</x-guest-layout>
