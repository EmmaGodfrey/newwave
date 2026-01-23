<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventImage extends Model
{
    protected $fillable = [
        'event_id',
        'image_path',
        'title',
        'description',
        'sort_order',
        'is_featured'
    ];

    protected $casts = [
        'is_featured' => 'boolean'
    ];

    public function event()
    {
        return $this->belongsTo(PortfolioEvent::class, 'event_id');
    }

    public function getFullImageUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }
}
