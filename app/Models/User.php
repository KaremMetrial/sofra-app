<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

     protected $fillable = array('avatar', 'name', 'email', 'password', 'phone_number', 'city_id');

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function menuItems()
    {
        return $this->belongsToMany('App\Models\MenuItem');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

}
