<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
    protected $table = 'demos';
    protected $fillable = ['name','email','body'];
}
