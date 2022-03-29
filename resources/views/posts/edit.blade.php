<x-app-layout>
    @slot('header')
        editer un post
    @endslot

        <form method="post" action="{{ route("post.update", ['post'=>$post]) }}">
            @csrf
            <input type="text" value="{{$post->title}}" name="title">
            @error('title') <p>{{$message}}</p> @enderror

            <textarea id="editor" name="body" >{{$post->body}}</textarea>
            @error('body') <p>{{$message}}</p> @enderror

            <input type="submit">
        </form>
</x-app-layout>
