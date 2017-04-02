<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterpise_info extends Model
{
    public $timestamps = false;
    protected $table="enterpise_info";
    protected $fillable = ['name_th', 'name_en', 'category', 'location', 'map_long', 'map_la', 'phone', 'fax', 'email', 'year','email'];

}
