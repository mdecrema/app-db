<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $fillable = [
        'user_id', 'ski_id', 'date'
    ];
}
