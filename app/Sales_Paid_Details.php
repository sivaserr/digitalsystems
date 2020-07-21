<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales_Paid_Details extends Model
{
    protected $table = 'sales_paid_details';
    protected $filable = ['sale_id','date','customer_id','paid_amount','return_box','note','bank_id','transfer_type','ref_no','balance'];
}
