<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = [
        'view', 'product', 'sale', 'view_name', 'product_id', 'order_id', 'dateTime'
    ];

}
