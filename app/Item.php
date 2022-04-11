<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    
    public function product()
    {
        return $this->belongsTo('App\Product', 'foreign_key');
    }

    public function order()
    {
        return $this->hasOne('App\Order');
    }
}
