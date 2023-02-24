<?php

namespace App\Http\Livewire\Public\Cosplay\Show\Comment;

use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Post;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Index extends Component
{
//    public $post;
    public $post;

    public $comments;

    public $newComment;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->comments = $this->post->comments;
    }

    public function render()
    {
        return view('livewire.public.cosplay.show.comment.index');
    }

    protected $listeners = ['refreshLikeComment' => '$refresh'];

    protected $rules = [
        'content' => ['required', 'string', 'min:10', 'max:500'],
    ];

    public function addComment()
    {
        if (auth()->user()->can('write-comment'))
//        if (auth()->user()->id == 2)
        {
            $this->validate();

            $createComment = Comment::create([
                'user_id' => auth()->user()->id,
                'post_id' => $this->post->id,
                'content' => $this->newComment,
                'likes' => 0,
            ]);
            $this->comments->push($createComment);
            $this->newComment = null;

//            return redirect()->to('#c-'.$createComment->id);
        }
        else
        {
            Alert::toast('You do not have permission!', 'error');
            return redirect()->route('public.cosplay.show', $this->post->id);
        }
    }

    public function deleteComment($commentID)
    {
        $comment = Comment::find($commentID);
        $comment->delete();
        $this->comments = $this->comments->except($commentID);
    }

    public function likeComment($commentID)
    {
        $comment = Comment::find($commentID);
        $commentLike = new CommentLike();

        if (empty($comment->liked()))
        {
            $commentLike->like($commentID, auth()->user()->id);
            $comment->countLikes();
        }
        else {
            $commentLike->unlike($commentID, auth()->user()->id);
            $comment->countLikes();
        }

        $this->emit('refreshLikeComment', $commentID);
    }
}
