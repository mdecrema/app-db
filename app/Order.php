<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $casts = [
        'products_id' => 'array'
    ];

    public function order() {
        return $this->hasMany('App\Item');
    }
}
