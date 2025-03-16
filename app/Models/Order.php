<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('order_number', 'total_price', 'status', 'address', 'note', 'delivery_fee', 'grand_total', 'payment_method', 'user_id', 'restaurant_id');
    protected $casts = [
        'status' => OrderStatus::class,
        'payment_method' => PaymentMethod::class,
    ];

    public function orderItems()
    {
        return $this->hasMany('App\Models\OrderItem');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }

    public function payment()
    {
        return $this->hasOne('App\Models\Payment');
    }

}
