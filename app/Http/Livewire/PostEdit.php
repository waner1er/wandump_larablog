<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostEdit extends Component
{
    public Post $post;
    public $show = false;
    protected $rules = [
        'post.title' => 'required',
        'post.body' => 'required',
    ];

    public function toggle()
    {
        if ($this->show) {
            $this->show = false;
        } else {
            $this->show = true;
        }
    }

    public function submit()
    {
        $this->validate();
        $this->post->update();
        session()->flash('message', 'Votre post a été mis a jour');

    }

    public function render()
    {
        return view('livewire.post-edit');
    }
}
