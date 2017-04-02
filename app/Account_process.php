<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account_process extends Model
{
    public $timestamps = false;
    protected $table="account_process";
    protected $fillable = ['code_id', 'code_man', 'money', 'time', 'time_all', 'date_start', 'date_end', 'return_round', 'return_total', 'return_final' ];

}
