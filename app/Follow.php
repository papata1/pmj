<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    public $timestamps = false;
    protected $table="follow";
    protected $fillable = ['method', 'remain', 'cost', 'date_loan', 'date_garun', 'id_borrower'];

}
