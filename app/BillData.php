<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillData extends Model
{
    protected $table = 'bill_data';
    protected $fillable = [
    'customer_id',
    'billproductname',
    'box',
    'loosekg',
    'totalweight',
    'perkgprices',
    'actualprice',
    'discount',
    'discountprice',
    'netvalue'
    ];
}
