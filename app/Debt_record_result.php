<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debt_record_result extends Model
{
    public $timestamps = false;
    protected $table="debt_record_result";
    protected $fillable = ['contect_id', 'money', 'date_loan', 'date_count','money_remain','money_payed','mounth_remain', 'time_total', 'no','date_latest' ,'date_start', 'date_end', 'return_money', 'return_money_total', 'return_money_last', 'id_borrower'];

}
