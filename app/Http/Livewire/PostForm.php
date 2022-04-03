<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostForm extends Component
{
    public Post $post;

    public function render()
    {
        return view('livewire.post-form');
    }
}
