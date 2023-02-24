<?php

namespace App\Http\Livewire\Public\Cosplay\Show\Comment;

use App\Models\Comment;
use App\Models\CommentLike;
use Livewire\Component;

class Likes extends Component
{
    public $comment;

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function render()
    {
        return view('livewire.public.cosplay.show.comment.likes');
    }

    public function commentLike()
    {
        $commentLike = new CommentLike();

        if (empty($this->comment->liked()))
        {
            $commentLike->like($this->comment->id, auth()->user()->id);
            $this->comment->countLikes();
        }
        else {
            $commentLike->unlike($this->comment->id, auth()->user()->id);
            $this->comment->countLikes();
        }
    }
}
