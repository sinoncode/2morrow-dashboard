<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'role',
        'city',
        'address',
        'description',
    ];
}
