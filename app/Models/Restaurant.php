<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Restaurant extends Authenticatable
{
  use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'restaurants';
    public $timestamps = true;
    protected $fillable = array('logo', 'images', 'name', 'email', 'password', 'phone_number', 'whatsapp_number', 'description', 'min_order_amount', 'delivery_fee', 'rating', 'open_time', 'close_time', 'location', 'is_active', 'city_id', 'category_id');
    protected $hidden = array('password');

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function orderItems()
    {
        return $this->hasMany('App\Models\MenuItem');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function offers()
    {
        return $this->hasMany('App\Models\Offer');
    }

    public function commissions()
    {
        return $this->hasMany('App\Models\Commission');
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
