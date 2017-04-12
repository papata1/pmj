<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterpise_list extends Model
{
    public $timestamps = false;
    protected $table="enterpise_list";
    protected $fillable = ['name_l', 'cost_l', 'enterpise_info_id'];

}
