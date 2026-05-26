<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitRequest extends Model
{
    protected $fillable = [
        'visitor_name', 'visitor_email', 'phone',
        'prisoner_name', 'requested_date', 'status'
    ];
}