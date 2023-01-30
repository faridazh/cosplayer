<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Cosplayer extends Model
{
    use SoftDeletes, HasRoles;

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

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'cosplayer_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
