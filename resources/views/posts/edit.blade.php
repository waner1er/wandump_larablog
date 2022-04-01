<x-app-layout>
    @slot('header')
        <h2>
            {{ __('post.edit') }}
        </h2>
    @endslot|
    <form action="{{ route('posts.update', ['post' => $post]) }}" method="POST">
        @csrf
        <div>
            <div>
                @if (Session::has('success'))
                    <div>
                        <button type="button">×</button>
                        {{ Session::get('success') }}
                    </div>
                @elseif(Session::has('failed'))
                    <div>
                        <button type="button">×</button>
                        {{ Session::get('failed') }}
                    </div>
                @endif
                <div>
                    <div>
                        <h4> CK Editor 4 in Laravel 8 </h4>
                    </div>
                    <div>
                        <div>
                            <label> Title </label>
                            <input type="text" name="title" value="{{ $post->title }}">
                        </div>
                        <div>
                            <label> Body </label>
                            <textarea id="description" placeholder="Enter the Description" name="description">{{ $post->description }}</textarea>
                        </div>
                    </div>

                    <div>
                        <button type="submit"> Save </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
