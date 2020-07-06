<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    protected $table = 'purchases';
    protected $fillable = [
    'bill_no',
    'supplier_id',
    'date',
    'trip_id',
    'total_no_of_box',
    'no_of_ice_bar',
    'per_ice_bar',
    'per_packing_price',
    'today_box',
    'balance_box',
    'total_box',
    'grass_amount',
    'transport_charge',
    'icebar_amount',
    'packing_charge',
    'excess',
    'less',
    'current_balance',
    'pre_balance',
    'overall',
    'amount_pending',
    'box_pending'
    // 'total_box',
    // 'ice_bar',
    // 'per_ice_bar',
    // 'total_ice_bar',
    // 'per_packing_price',
    // 'transport_charge',
    // 'total_icebar',
    // 'less',
    // 'packing_charge',
    // 'excess',
    // 'supplier_pending',
    // 'overall'
];





}
