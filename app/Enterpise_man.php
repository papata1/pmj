<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterpise_man extends Model
{
    public $timestamps = false;
    protected $table="enterpise_man";
    protected $fillable = ['name_m', 'surename_m','location_m', 'phone_m', 'enterpise_info_id', 'cat'];

}
