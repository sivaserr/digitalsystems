<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerRateFixing extends Model
{
    protected $table = 'customer_rate_fixings';
    protected $fillable = ['customer_id','product_id','fixing_rate'];
}
