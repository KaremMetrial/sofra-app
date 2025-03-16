<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model 
{

    protected $table = 'order_items';
    public $timestamps = true;
    protected $fillable = array('quantity', 'price', 'special_request', 'order_id', 'menu_item_id');

    public function menuItem()
    {
        return $this->belongsTo('App\Models\MenuItem');
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

}