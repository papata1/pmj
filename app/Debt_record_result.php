<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debt_record_result extends Model
{
    public $timestamps = false;
    protected $table="debt_record_result";
    protected $fillable = ['payed', 'dete', 'letter', 'no', 'debt_sign', 'date_sign', 'exp_sign', 'result', 'so', 'name' , 'position' ];

}
