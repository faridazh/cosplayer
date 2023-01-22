<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cosplayer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'avatar',
        'cover',
        'name',
        'slug',
        'description',
        'social',
        'shop',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'avatar' => 'string',
        'cover' => 'string',
        'name' => 'string',
        'slug' => 'string',
        'description' => 'string',
        'social' => 'json',
        'shop' => 'json',
    ];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
