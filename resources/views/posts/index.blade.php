<x-guest-layout>
    <div class="archive-posts container">
        {{--        {{dd($posts)}}--}}
        <div class="ages-grid">
            @foreach($ages as $age)
                <div class="age">
                    <h2>{{$age->name}}</h2>
                    <div class="age-grid age__box" >
                        @foreach($age->featured_posts as $post)
                            <div class="age-item" data-expand-target>
                                {!! $post->image !!}
                                <div>
                                   <h3>{{$post->title}}</h3>
                                    {{$post->description}}
                                </div>
                                <a href="{{route('posts.show', ['post'=>$post->id])}}" data-expand-link></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-guest-layout>

