<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $casts = [
        'sizes' => 'array'
    ];

    protected $fillable = [
        'nome', 'photo1', 'photo2', 'photo3', 'photo4', 'photo5', 'category_id', 'category_title', 'genere', 
        'description', 'colore', 'sizes', 'counterSizeType', 'brand', 'amount', 'availability', 'valutazione', 'appView'
    ];

    public function items()
    {
        return $this->hasMany('App\Item');
    }
}
