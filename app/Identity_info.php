<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identity_info extends Model
{
    public $timestamps = false;
    protected $table="identity_info";
     protected $fillable = ['name', 'surename', 'id_p', 'id_exp', 'prefix', 'dob', 'category', 'id_rela'];

}
