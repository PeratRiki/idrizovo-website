<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktivnost extends Model
{
    use HasFactory;

    protected $table = 'aktivnosti';

    protected $fillable = [
        'title',
        'description',
        'image',
        'is_featured',
        'sort_order',
        'is_active',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}