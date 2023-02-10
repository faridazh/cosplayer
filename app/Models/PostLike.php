<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostLike extends Model
{
    public $timestamps = false;

    public $fillable = [
        'post_id',
        'user_id',
    ];

    public $casts = [
        'post_id' => 'integer',
        'user_id' => 'integer',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function like($post, $user)
    {
        $this->attributes['post_id'] = $post;
        $this->attributes['user_id'] = $user;
        $this->save();
    }

    public function unlike($post, $user)
    {
        $this->where('post_id', $post)->where('user_id', $user)->delete();
    }
}
