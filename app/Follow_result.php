<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow_result extends Model
{
    public $timestamps = false;
    protected $table="follow_result";
    protected $fillable = ['pay', 'date', 'letter', 'letter1', 'so', 'book', 'date_con', 'exp', 'result', 'then', 'name', 'position', 'id_fo'];

}
