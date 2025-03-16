<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model 
{

    protected $table = 'commissions';
    public $timestamps = true;
    protected $fillable = array('total_sales', 'commission_fee', 'amount_paid', 'remaining_due', 'transfer_reference', 'note', 'restaurant_id');

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }

}