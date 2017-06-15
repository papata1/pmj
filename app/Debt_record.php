<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debt_record extends Model
{
    public $timestamps = false;
    protected $table="debt_record";
    protected $fillable = ['debt', 'payed', 'money_remain', 'date_loan', 'date_ga', 'remain_round', 'objective_debt', 'job_debt', 'id_borrower', 'no_payed' , 'remain_round',];

}
