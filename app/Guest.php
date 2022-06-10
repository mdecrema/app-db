<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'firstName', 'lastName', 'email', 'role'
    ];
}
