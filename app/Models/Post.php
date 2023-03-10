<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'cosplayer_id',
        'cover',
        'title',
        'slug',
        'description',
        'is_nsfw',
        'is_hidden',
        'is_approved',
        'social',
        'shop',
        'tags',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'cosplayer_id' => 'integer',
        'cover' => 'string',
        'title' => 'string',
        'slug' => 'string',
        'content' => 'string',
        'is_nsfw' => 'boolean',
        'is_hidden' => 'boolean',
        'is_approved' => 'boolean',
        'social' => 'array',
        'shop' => 'array',
        'tags' => 'array',
    ];

    public function cosplayer(): BelongsTo
    {
        return $this->belongsTo(Cosplayer::class, 'cosplayer_id', 'id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function liked()
    {
        return PostLike::where('user_id', auth()->user()->id)->where('post_id', $this->id)->first();
    }

    public function totalLikes(): HasMany
    {
        return $this->hasMany(PostLike::class, 'post_id', 'id');
    }

    public function countLikes()
    {
        $this->attributes['likes'] = $this->totalLikes()->count();
        $this->save();
    }
}
