<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $table= 'trips';
    protected $fillable = ['trip_name','date','status'];
}
