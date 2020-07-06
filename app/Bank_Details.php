<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank_Details extends Model
{
    protected $table = 'bank_details';
    protected $fillable = ['ac_holder','ac_no','bank_name','short_name'];
}
