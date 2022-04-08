<x-app-layout>
    @slot('header')
        <h2>
            {{ __('post.create') }}
        </h2>
    @endslot
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <div>
                <label> Title </label>
                <input type="text" name="title">
            </div>
            @error('title')
            <div>{{ $message }}</div> @enderror

            <label for="image"> Image </label>
            <textarea id="upload_image" placeholder="upload image" name="image"></textarea>
            @error('image')
            <div>{{ $message }}</div> @enderror

            <select type="select" id="category_id" name="category_id">
                <option value="#">Choose</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
            <div>{{$message}}</div> @enderror

            <select type="select" id="age_id" name="age_id">
                <option value="#">Choose</option>
            @foreach($ages as $age)
                    <option value="{{$age->id}}">{{$age->name}}</option>
                @endforeach
            </select>
            @error('age_id')
            <div>{{$message}}</div>@enderror

            <textarea id="editor" placeholder="Enter the Description" name="description"></textarea>
            @error('description')
            <div>{{ $message }}</div> @enderror
        </div>
        <button type="submit">{{ __('post.save') }}</button>
    </form>
</x-app-layout>
