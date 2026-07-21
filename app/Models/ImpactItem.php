<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImpactItem extends Model
{
    protected $fillable = [
        'label',
        'title',
        'image',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
