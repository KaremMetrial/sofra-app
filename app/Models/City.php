<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('name', 'governorate_id');

    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate');
    }

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function restaurants()
    {
        return $this->hasMany('App\Models\Restaurant');
    }

}