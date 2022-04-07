<x-guest-layout>
    <div class="archive-posts">
        {{--        {{dd($posts)}}--}}
        <div class="post-grid">
            @foreach($posts as $post)
                <div>
                    {!! $post->image !!}
                    <p>{{$post->category->name}}</p>
                    <h2>{{$post->title}}</h2>
                    <div>{{$post->description}}</div>
                </div>
            @endforeach
        </div>
    </div>

</x-guest-layout>

<style>
    html, body {
        margin: 0;
    }
    .post-grid {
        display: grid;
        grid-gap: 2rem;
        grid-template-columns: repeat(3, 1fr);
        padding: 1rem;
    }
</style>
