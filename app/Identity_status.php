<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identity_status extends Model
{
    public $timestamps = false;
    protected $table="identity_status";
     protected $fillable = ['date', 'year', 'check_live', 'live_cate', 'live_status', 'm_status', 'job', 'income','c_live_status', 'cat','process'];

}
