<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id','prod_name', 'prod_desc','prod_amt','prod_qty','prod_brand','prod_category','prod_image'
    ];
}
