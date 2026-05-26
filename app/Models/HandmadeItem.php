<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HandmadeItem extends Model
{
    protected $fillable = [
        'category',
        'title',
        'description',
        'image_main',
        'images_extra',
        'link_url',
        'quote',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'images_extra' => 'array',
        'is_active'    => 'boolean',
    ];

    // Само активни, по редослед
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }
}