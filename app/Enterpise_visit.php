<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterpise_visit extends Model
{
    public $timestamps = false;
    protected $table="enterpise_visit";
    protected $fillable = ['status', 'remark', 'enterpise_info_id'];

}
