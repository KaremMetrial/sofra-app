<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model 
{

    protected $table = 'menu_items';
    public $timestamps = true;
    protected $fillable = array('title', 'image', 'description', 'preparation_time', 'price', 'restaurant_id');

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }

    public function orderItems()
    {
        return $this->hasMany('App\Models\OrderItem');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

}