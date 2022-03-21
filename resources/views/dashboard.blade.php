@component('layouts.app')
    @slot('header')
        <h2>
            {{ __('Logged In Dashboard') }}
        </h2>
    @endslot
    You're logged in!
    <form action="">
        <textarea id="laraberg" name="[name_here]" hidden></textarea>
    </form>

@endcomponent
