<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyRequest extends Model
{
    protected $table = 'requests';

    protected $fillable = [
        'client_name',
        'client_email',
        'client_phone',
        'request_type',
        'status',
        'budget_min',
        'budget_max',
        'city',
        'property_type',
        'criteria',
        'notes',
        'agent_id',
    ];
}
