<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesProducts extends Model
{
    protected $table = 'sales_products';

    protected $fillable = ['sales_id','customer_id','product_id','box','weight','net_weight','loose_box','loose_kg','total_weight','price','netvalue'];
}
