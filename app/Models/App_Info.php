<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class App_Info extends Model 
{

    protected $table = 'app_info';
    public $timestamps = true;
    protected $fillable = array('app_name', 'description');

}