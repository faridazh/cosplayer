<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentLike extends Model
{
    public $timestamps = false;

    public $fillable = [
        'comment_id',
        'user_id',
    ];

    public $casts = [
        'comment_id' => 'integer',
        'user_id' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comment(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    }

    public function like($comment, $user)
    {
        $this->attributes['comment_id'] = $comment;
        $this->attributes['user_id'] = $user;
        $this->save();
    }

    public function unlike($comment, $user)
    {
        $this->where('comment_id', $comment)->where('user_id', $user)->delete();
    }
}
