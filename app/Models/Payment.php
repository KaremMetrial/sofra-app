<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $table = 'payments';
    public $timestamps = true;
    protected $fillable = array('payment_method', 'transaction_id', 'status', 'order_id');
    protected $casts = [
        'payment_method' => PaymentMethod::class,
        'status' => PaymentStatus::class,
    ];

    public function order()
    {
        return $this->hasOne('App\Models\Order');
    }

}
