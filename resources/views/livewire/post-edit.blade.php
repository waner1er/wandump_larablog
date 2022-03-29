<div>
@slot("header")
        <h1>Editer un post </h1>
    @endslot
        <button wire:click="toggle">
        @if(!$show)
            éditer V
        @else
            fermer
        @endif
    </button>
    @if($show)
        <form wire:submit.prevent="submit">
            <input type="text" wire:model="post.title">
            <textarea class="ckeditor" name="wysiwyg-editor"></textarea>
            <input type="submit">
        </form>

    @endif
{{--    <div wire:loading>--}}
{{--        enregistrement ...--}}
{{--    </div>--}}
    <div>
        @if (session()->has('message'))
            <div class="message-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <h1>{!!  $post->title !!}</h1>
    <p>{!!  $post->body !!}</p>

</div>

