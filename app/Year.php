<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ask extends Model
{
    public $timestamps = false;
    protected $table="Year";
    protected $fillable = ['name' ];
}
