<x-guest-layout>
    <div class="archive-posts">
        @foreach($categories as $category)
            <div class="post">
                <h2>{{$category->name}}</h2>
                <div class="post-grid">
                    @foreach($category->post as $post)
                        <div>
                            {{--                        {{$post->category?->name}}--}}
                            <h3> {{$post->title}}</h3>
                            <p>{{$post->description}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

</x-guest-layout>

<style>
    html, body {
        margin: 0;
    }

    .archive-posts {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;

    }

    .post {
        flex: 40%;

    }

    .post h2 {
        text-align: center;
    }

    .post-grid {
        flex-wrap: wrap;
        display: grid;
        grid-gap: 2rem;
        grid-template-columns: repeat(3, 1fr);
        padding: 1rem;
        border: 1px solid red;
    }
</style>
