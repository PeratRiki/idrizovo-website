<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novost extends Model
{
    use HasFactory;

    protected $table = 'novosti';

    protected $fillable = [
        'title',
        'category',
        'description',
        'image_main',
        'images_extra',
        'published_at',
        'sort_order',
        'is_active',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}