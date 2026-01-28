<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'address',
        'map_url',
    ];

    /**
     * Get the first (and typically only) contact settings record
     */
    public static function getSettings()
    {
        return self::first();
    }
}
