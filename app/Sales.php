<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';
    protected $fillable = ['sale_no' ,'customer_id','date','total_box','loose_box','ovarall_box','netvalue','previous_balance','ovarall_balance'];


}
