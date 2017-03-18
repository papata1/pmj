<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $timestamps = false;
    protected $table="address";
    protected $fillable = ['address', 'village', 'room_number', 'room_floor', 'group_home', 'alley', 'road', 'local', 'district', 'province', 'zip_code', 'phone', 'category', 'id_rela'];

}
