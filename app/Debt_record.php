<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debt_record extends Model
{
    public $timestamps = false;
    protected $table="debt_record";
    protected $fillable = ['follow_debt', 'return_round_remain', 'money_remain', 'date_loan', 'date_ga' ];

}
