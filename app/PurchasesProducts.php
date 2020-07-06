<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchasesProducts extends Model
{
    protected $table = 'purchases_products';
    protected $fillable = [
    'bill_id',
    'supplier_id',
    'product_id',
    'box',
    'weight',
    'loose_box',
    'loose_kg',
    'net_weight',
    'discount',
    'total_weight',
    'price',
    'netvalue'
    // 'loosekg',
    // 'netweight',
    // 'perkgprices',
    // 'actualprice',
    // 'discount',
    // 'discountprice',
    // 'netvalue'
    ];
}
