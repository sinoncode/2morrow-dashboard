<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'title',
        'type',
        'status',
        'start_time',
        'end_time',
        'agent_id',
        'contact_id',
        'request_id',
        'property_id',
        'notes',
    ];
}
