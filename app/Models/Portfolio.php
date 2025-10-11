<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'title',
        'description',
        'media',
        'type',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer'
    ];

    // Scope for active portfolios
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for key creations
    public function scopeKeyCreations($query)
    {
        return $query->where('type', 'key');
    }

    // Scope for other projects
    public function scopeOtherProjects($query)
    {
        return $query->where('type', 'other');
    }

    // Order by order field
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
