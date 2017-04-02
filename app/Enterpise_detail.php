<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enterpise_detail extends Model
{
    public $timestamps = false;
    protected $table="enterpise_detail";
    protected $fillable = ['money_category', 'objective', 'target_group', 'budgets', 'budgets_fund', 'budgets_pre', 'other_fund', 'fund_cate', 'name', 'cost','enterpise_info_id'];

}
