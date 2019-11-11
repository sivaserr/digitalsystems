<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
 
    protected $fillable = ['name','email','reg_no','degree','department','year','semester','section'];    
}
