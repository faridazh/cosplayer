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
        'social' => 'array',
        'shop' => 'array',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'cosplayer_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function totalPosts(): HasMany
    {
        return $this->hasMany(Post::class, 'cosplayer_id', 'id');
    }

    public function countPosts()
    {
        $this->attributes['posts'] = $this->totalPosts()->count();
        $this->save();
    }

    public function stared()
    {
        return CosplayerStar::where('user_id', auth()->user()->id)->where('cosplayer_id', $this->id)->first();
    }

    public function totalStars(): HasMany
    {
        return $this->hasMany(CosplayerStar::class, 'cosplayer_id', 'id');
    }

    public function countStars()
    {
        $this->attributes['stars'] = $this->totalStars()->count();
        $this->save();
    }
}
