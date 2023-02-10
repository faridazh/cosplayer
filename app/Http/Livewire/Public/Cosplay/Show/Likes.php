<?php

namespace App\Http\Livewire\Public\Cosplay\Show;

use App\Models\Post;
use App\Models\PostLike;
use Livewire\Component;

class Likes extends Component
{
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.public.cosplay.show.likes');
    }

    public function postlike()
    {
        $postlike = new PostLike();

        if (empty($this->post->liked()))
        {
            $postlike->like($this->post->id, auth()->user()->id);
            $this->post->countLikes();
        }
        else {
            $postlike->unlike($this->post->id, auth()->user()->id);
            $this->post->countLikes();
        }
    }
}
