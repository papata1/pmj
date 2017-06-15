<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps = false;
    protected $table="payment";
    protected $fillable = ['date_pay', 'place_pay', 'total', 'bill_book', 'bill_no', 'remark', 'id_borrower', 'order_date', 'order_no'];

}
