<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
    protected $fillable = ['bill_no','customer_id','date','product_id','box','kg','net_weight','per_kg_price','actual_price','discount','discount_price','nat_value'];
}
