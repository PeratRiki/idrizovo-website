<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'name',
        'email',
        'message',
        'is_read',
        'reply',
        'replied_at',
        'subject',
        'priority',
    ];
}