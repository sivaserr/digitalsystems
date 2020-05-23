<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales_Paid_Details extends Model
{
    protected $table = 'sales_paid_details';
    protected $filable = ['bill_id','date','paid_amount','return_box','note'];
}
