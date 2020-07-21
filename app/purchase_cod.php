<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchase_cod extends Model
{
    protected $table = 'purchase_cod';
    protected $fillable = ['bill_id','date','supplier_id','bill_amount','recived_amount','return_box','note','balance'];
}
