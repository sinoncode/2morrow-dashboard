<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailMessage extends Model
{
    protected $table = 'emails';

    protected $fillable = [
        'from_email',
        'to_email',
        'subject',
        'body',
        'status',
        'sent_at',
        'attachments',
    ];
}
