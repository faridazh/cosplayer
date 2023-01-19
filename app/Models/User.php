<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Models\Contracts\HasName;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail, FilamentUser, HasAvatar, HasName
{
    use HasApiTokens, Notifiable, HasRoles, SoftDeletes, TwoFactorAuthenticatable;

    protected $fillable = [
        'username',
        'avatar',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'avatar' => 'string',
        'email_verified_at' => 'datetime',
    ];

    public function canAccessFilament(): bool
    {
        return $this->can('access-filament');
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return !empty($this->avatar) ? asset($this->avatar) : asset('assets/avatar/default_avatar.png');
    }

    public function getFilamentName(): string
    {
        return "{$this->username}";
    }

    public function verifyEmail()
    {
        $this->attributes['email_verified_at'] = date('Y-m-d h:i:s', time());
        $this->save();
    }

    public function unVerifyEmail()
    {
        $this->attributes['email_verified_at'] = null;
        $this->save();
    }
}
