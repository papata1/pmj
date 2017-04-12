<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterpise_info extends Model
{
    public $timestamps = false;
    protected $table="enterpise_info";
    protected $fillable = ['year','date','name_th', 'name_en', 'company','category','category_other', 'location', 'map_long', 'map_la', 'phone', 'fax', 'email', 'year_start','email','objective_i'];

}
