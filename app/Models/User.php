<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'foto',
        'email',
        'password',
        'phone',
        'role',
        'otp',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }

    public function tickets()
    {
        return $this->hasMany(Tiket::class, 'user_id');
    }
}
