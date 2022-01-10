<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ski extends Model
{
    protected $fillable = [
        'length', 'level', 'brand', 'model', 'value', 'type', 'status'
    ];

    
}
