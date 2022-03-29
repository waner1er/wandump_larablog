<x-app-layout>
    @slot("header")
        <h1>posts</h1>
    @endslot
    @foreach($posts as $post)
        <div data-expand-target>
            <h2>{{$post->title}}</h2>
            <p>{!! $post->body !!}</p>
            <a href="{{route('posts.edit', ['post'=>$post->id])}}" data-expand-link>éditer le post </a>
        </div>
    @endforeach
</x-app-layout>
