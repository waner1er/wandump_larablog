<x-app-layout>
    @slot('header')
        <h2>
            {{ __('post.edit') }}
        </h2>
    @endslot
    <form action="{{ route('posts.update', ['post' => $post]) }}" method="post">
        @csrf
        <div class="flex items-center ">


{{--            <input type="checkbox" name="featured"  value="{{$post->featured}}" {{ $post->featured ? 'checked="checked"' : '' }}/>--}}
            <div class="flex items-center justify-center w-full mb-12">

                <label for="toggleB" class="flex items-center cursor-pointer">
                    <!-- toggle -->
                    <div class="relative">
                        <!-- input -->
                        <input type="checkbox" id="featured" class="sr-only" value="{{$post->featured}}" {{
                        $post->featured ? 'checked="checked"' : '' }}>
                        <!-- line -->
                        <div class="block bg-gray-600 w-14 h-8 rounded-full"></div>
                        <!-- dot -->
                        <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition"></div>
                    </div>
                    <!-- label -->
                    <div class="ml-3 text-gray-700 font-medium">
                        Toggle Me!
                    </div>
                </label>

            </div>
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
