<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
        'content',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'post_id',
        'content',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function liked()
    {
        return CommentLike::where('user_id', auth()->user()->id)->where('comment_id', $this->id)->first();
    }

    public function totalLikes(): HasMany
    {
        return $this->hasMany(CommentLike::class, 'comment_id', 'id');
    }

    public function countLikes()
    {
        $this->attributes['likes'] = $this->totalLikes()->count();
        $this->save();
    }
}
