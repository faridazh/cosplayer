<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CosplayerStar extends Model
{
    public $timestamps = false;

    public $fillable = [
        'cosplayer_id',
        'user_id',
    ];

    public $casts = [
        'cosplayer_id' => 'integer',
        'user_id' => 'integer',
    ];

    public function cosplayer(): BelongsTo
    {
        return $this->belongsTo(Cosplayer::class, 'cosplayer_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function star($cosplayer, $user)
    {
        $this->attributes['cosplayer_id'] = $cosplayer;
        $this->attributes['user_id'] = $user;
        $this->save();
    }

    public function unstar($cosplayer, $user)
    {
        $this->where('cosplayer_id', $cosplayer)->where('user_id', $user)->delete();
    }
}
