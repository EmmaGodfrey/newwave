<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PortfolioCategory;
use App\Models\PortfolioEvent;
use App\Models\EventImage;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Categories
        $weddings = PortfolioCategory::create([
            'name' => 'Weddings',
            'slug' => 'weddings',
            'description' => 'Capturing love, one moment at a time.',
            'sort_order' => 1,
            'is_active' => true
        ]);

        $portraits = PortfolioCategory::create([
            'name' => 'Portraits',
            'slug' => 'portraits', 
            'description' => 'Every face tells a story — let\'s tell yours.',
            'sort_order' => 2,
            'is_active' => true
        ]);

        $sports = PortfolioCategory::create([
            'name' => 'Sports',
            'slug' => 'sports',
            'description' => 'The art of athletic moments.',
            'sort_order' => 3,
            'is_active' => true
        ]);
    }
}
