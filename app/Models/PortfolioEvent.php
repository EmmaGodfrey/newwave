<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PortfolioEvent extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'description',
        'featured_image',
        'event_date',
        'location',
        'sort_order',
        'is_featured',
        'is_active'
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_featured' => 'boolean',
        'is_active' => 'boolean'
    ];

    public function category()
    {
        return $this->belongsTo(PortfolioCategory::class, 'category_id');
    }

    public function images()
    {
        return $this->hasMany(EventImage::class, 'event_id')->orderBy('sort_order');
    }

    public function featuredImage()
    {
        return $this->hasOne(EventImage::class, 'event_id')->where('is_featured', true);
    }

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($event) {
            if (empty($event->slug)) {
                $event->slug = Str::slug($event->title);
            }
        });
    }
}
