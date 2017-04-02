<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterpise_approval extends Model
{
    public $timestamps = false;
    protected $table="enterpise_approval";
    protected $fillable = ['status', 'money', 'enterpise_info_id', 'remark'];

}
