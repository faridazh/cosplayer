<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        'social' => 'json',
        'shop' => 'json',
    ];

    public function cosplayer(): BelongsTo
    {
        return $this->belongsTo(Cosplayer::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
