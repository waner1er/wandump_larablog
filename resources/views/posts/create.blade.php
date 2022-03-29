<x-app-layout>
    @slot('header')
        <h2>
            {{ __('Créer un post ') }}
        </h2>
    @endslot

    <form class="post-form" method="post" action="{{ route('post.store') }}">
        @csrf
        <label for="title"></label>
        <input type="text" name="title" value="{{ old('title') }}">
        @error('title') <p>{{$message}}</p> @enderror

       <label for="body"></label>
        <textarea id="editor" type="text" name="body" value="{{ old('body') }}"></textarea>
        @error('body') <p>{{$message}}</p> @enderror

        <input type="submit">
    </form>
</x-app-layout>
