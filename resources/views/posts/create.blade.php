<x-app-layout>
    @slot('header')
    <h2>
        {{ __('post.create') }}
    </h2>
@endslot|
    <a href="{{ route('posts.index') }}" class="btn btn-danger"> Back </a>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div>
            <div>
                <div>
                    <div>
                        <h4> CK Editor 4 in Laravel 8 </h4>
                    </div>
                    <div>
                        <div>
                            <label> Title </label>
                            <input type="text" name="title" placeholder="Enter the Title">
                        </div>
                        <div>
                            <label> age </label>
                            <select type="select" name="age">
                                <option value="">--Please choose an option--</option>
                                <option value="baby">Bébé</option>
                                <option value="mat_child">3-6 ans</option>
                                <option value="elem_child">7-10 ans</option>
                                <option value="pre_teen">11-13 ans</option>
                                <option value="teen">14-17</option>
                                <option value="other">Autres</option>
                            </select>
                        </div>
                        <div>
                            <label> Body </label>
                            <textarea id="description" placeholder="Enter the Description" name="description"></textarea>
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
