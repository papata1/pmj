<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan_info extends Model
{
    public $timestamps = false;
    protected $table="loan_info";
     protected $fillable = ['total', 'payed', 'return_round_remain', 'total_remain', 'pay_last', 'pay_date_last', 'object', 'job'];
}
