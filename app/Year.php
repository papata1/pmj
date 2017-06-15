<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    public $timestamps = false;
    protected $table="year";
    protected $fillable = ['year','year_en' ];
}
