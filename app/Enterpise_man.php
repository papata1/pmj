<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterpise_man extends Model
{
    public $timestamps = false;
    protected $table="enterpise_man";
    protected $fillable = ['name', 'surename','location', 'phone', 'enterpise_info_id'];

}
