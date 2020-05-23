<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'paid_details';
    protected $fillable = ['bill_id','date','paid_amount','return_box','note'];
}
