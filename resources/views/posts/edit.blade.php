<x-app-layout>
    @slot('header')
        <h2>
            {{ __('post.edit') }}
        </h2>
    @endslot
    <form action="{{ route('posts.update', ['post' => $post]) }}" method="post">
        @csrf
        <div>
            <div>
                <label> Title </label>
                <input type="text" name="title" value="{{ $post->title }}">
            </div>
            @error('title')
            <div>{{ $message }}</div> @enderror

            <select type="select" id="category_id" name="category_id">
                <option value="{{ $post->category->id  }}">Actuel : {{ $post->category->name }}</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
            <div>{{$message}}</div> @enderror

            <select type="select" id="age_id" name="age_id">
                <option value="{{  $post->age->id }} ">Actuel : {{ $post->age->name }}</option>
                @foreach($ages as $age)
                    <option value="{{$age->id}}">{{$age->name}}</option>
                @endforeach
            </select>
            @error('age_id')
            <div>{{$message}}</div>@enderror

            <textarea id="editor" placeholder="Enter the Description" name="description">
                                {{ $post->description }}
                            </textarea>
            @error('description')
            <div>{{ $message }}</div> @enderror
        </div>
        <button type="submit">{{ __('post.save') }}</button>
    </form>
</x-app-layout>
