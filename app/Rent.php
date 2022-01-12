<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $fillable = [
        'user_id', 'name', 'weight', 'height', 'footLength', 'level', 'packType', 'ski', 'boots', 'helmet', 'amount', 'ski_id', 'boots_id', 'date'
    ];
}
