<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ToggleButton extends Component
{
    public Post $post;

    protected $rules = [
        'post.title' => 'required',
    ];

    public function update()
    {
        $this->validate();

        $this->post->save();

        session()->flash('message', 'Post successfully updated.');
    }


    public function render()
    {

        return view('livewire.toggle-button');
    }
}
