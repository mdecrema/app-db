<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'nome', 'photo1', 'photo2', 'photo3', 'photo4', 'photo5', 'categoria', 'genere', 'taglia', 
        'description', 'colore', 'brand', 'amount', 'availability', 'valutazione', 'appView'
    ];
}
