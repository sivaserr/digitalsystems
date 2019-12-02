<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
    protected $fillable = [
    'bill_no',
    'customer_id',
    'date',
    'total_box',
    'ice_bar',
    'per_ice_bar',
    'total_ice_bar',
    'per_packing_price',
    'transport_charge',
    'total_icebar',
    'less',
    'packing_charge',
    'excess',
    'previous_balance',
    'overall'
];





}
