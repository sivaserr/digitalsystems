<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sales_cod extends Model
{
    protected $table = 'sales_cod';
    protected $fillable = ['sale_id','date','customer_id','bill_amount','recived_amount','return_box','note','balance'];
}
