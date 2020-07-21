<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerRateFixingProduct extends Model
{
    protected $table = 'customer_rate_fixing_products';
    protected $fillable = ['customerratefixing_id','customer_id','product_id','rate'];
}
