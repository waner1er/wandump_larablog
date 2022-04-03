<x-app-layout>
    @slot('header')
        <h2>
            {{ __('posts.list') }}
        </h2>
    @endslot
    @foreach($ages as $age)
        <div class="post">
                <h2>{{$age->name}}</h2>
            <div class="post-grid">
                @foreach($age->post as $post)
                    <div class="post-grid__card">
                        @if(isset($post->category->id))
                            {{ $post->category->name}}
                        @else
                            Autres
                        @endif
                        <div class="post-grid__card__header">
                            <h3> {{$post->title}}</h3>
                            {!! preg_replace('#<p(.*?)>(.*?)</p>#is', '$2<br/>', $post->image) !!}
                        </div>
                        <p>{!! $post->description !!}</p>
                        <a href="{{route('posts.edit', ['post'=>$post])}}">editer</a>
                    </div>

                @endforeach
            </div>
        </div>
    @endforeach

</x-app-layout>
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
    .post-grid__card__header img {
        max-width: 150px;
        max-height: 150px;
    }
</style>
