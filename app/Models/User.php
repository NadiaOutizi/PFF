<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Like;
use App\Models\Event;
use App\Models\EventRegistration;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
        public function likes()
    {
        return $this->belongsToMany(Event::class, 'likes')->withTimestamps();
    }
        public function events()
        {
            return $this->hasMany(Event::class);
        }
        public function likedEvents()
    {
        return $this->belongsToMany(Event::class, 'likes')->withTimestamps();
    }
    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }
}
