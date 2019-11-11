<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Teable name
    protected $table = 'posts';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;
}
