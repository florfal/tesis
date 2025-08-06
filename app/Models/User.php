<?php

namespace App\Models;

 use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'cover'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'followed_id', 'follower_id');
    }
    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'followed_id');
    }

    // Eventos creados por el usuario
    public function createdEvents()
    {
        return $this->hasMany(Event::class, 'creator_id', 'id');
    }

    // Eventos a los que asiste
    public function attendingEvents()
    {
        return $this->belongsToMany(Event::class, 'event_user', 'user_id', 'event_id');
    }

    /**
     * Relación uno a muchos con Media (avatar y cover)
     */
    public function media()
    {
        return $this->hasMany(Media::class);
    }

    /**
     * Relación uno a uno para avatar
     */
    public function avatar()
    {
        return $this->hasOne(Media::class)->where('type', 'avatar');
    }

    /**
     * Relación uno a uno para cover
     */
    public function cover()
    {
        return $this->hasOne(Media::class)->where('type', 'cover');
    }
}
