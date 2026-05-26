<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitRequest extends Model
{
    protected $fillable = [
        'visitor_name', 'visitor_email', 'phone',
        'prisoner_name', 'request_date', 'requested_date',
        'status', 'visit_count', 'notification_method', 'confirmation_code',
    ];

    protected $casts = [
        'requested_date' => 'date',
    ];
}