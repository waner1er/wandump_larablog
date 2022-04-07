<x-app-layout>


    @slot('header')
        <h2>
            {{ __('posts.list') }}
        </h2>
    @endslot
    <div @class('container mx-auto')>
        @livewire('post-table')
    </div>
</x-app-layout>

