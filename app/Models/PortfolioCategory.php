<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PortfolioCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function events()
    {
        return $this->hasMany(PortfolioEvent::class, 'category_id');
    }

    public function activeEvents()
    {
        return $this->hasMany(PortfolioEvent::class, 'category_id')
            ->where('is_active', true)
            ->orderBy('sort_order');
    }

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }
}
