<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrowing_info extends Model
{
    public $timestamps = false;
    protected $table="borrowing_info";
    protected $fillable = ['debt_cat', 'money', 'forwhat', 'pic', 'relation', 'job_borrow', 'role', 'income_borrow', 'bname', 'phone_job', 'newname', 'newsname', 'life'];

}
