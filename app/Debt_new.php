<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debt_new extends Model
{
    public $timestamps = false;
    protected $table="debt_new";
    protected $fillable = ['name','other', 'remark','id_borrower' ];
}
