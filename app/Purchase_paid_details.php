<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase_paid_details extends Model
{
    protected $table = 'paid_details';
    protected $fillable = ['bill_id','date','return_box','note','bank_id','transfer_type','ref_no'];
}
