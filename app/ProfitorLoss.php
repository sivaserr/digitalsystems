<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfitorLoss extends Model
{
    protected $table = 'profitor_losses';
    protected $fillable = ['purchase_amount','total_expense','sale_amount','profit'];
}
