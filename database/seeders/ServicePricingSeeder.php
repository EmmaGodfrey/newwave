<?php

namespace Database\Seeders;

use App\Models\ServicePricing;
use Illuminate\Database\Seeder;

class ServicePricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Event Coverage',
                'slug' => 'event-coverage',
                'description' => 'Full event documentation',
                'price' => 900.00,
                'price_label' => 'Starting at',
                'duration' => 'Full Day',
                'features' => [
                    'Full event documentation',
                    '200+ edited photos',
                    'Highlight reel video',
                    'Social media content',
                    '2 photographers',
                    'Online gallery'
                ],
                'category' => 'Event',
                'order' => 1,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Brand Campaign',
                'slug' => 'brand-campaign',
                'description' => 'Custom content strategy',
                'price' => 800.00,
                'price_label' => 'Starting at',
                'duration' => '2-3 Days',
                'features' => [
                    'Custom content strategy',
                    '50 branded photos',
                    'Promotional video',
                    'Social media assets',
                    'Brand storytelling',
                    'Usage rights included'
                ],
                'category' => 'Brand',
                'order' => 2,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Car Photography',
                'slug' => 'car-photography',
                'description' => 'Studio or location shoot',
                'price' => 700.00,
                'price_label' => 'Starting at',
                'duration' => 'Half Day',
                'features' => [
                    'Studio or location shoot',
                    'Multiple angles covered',
                    '30 edited photos',
                    'Detail & action shots',
                    'Drone footage available',
                    'Commercial usage rights'
                ],
                'category' => 'Auto',
                'order' => 3,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Automotive Photography',
                'slug' => 'automotive-photography',
                'description' => 'Professional car photography showcasing vehicles in their best light',
                'price' => 500.00,
                'price_label' => 'Starting at',
                'duration' => '3-4 Hours',
                'features' => [
                    'Static studio shots',
                    'Dynamic action captures',
                    '25 edited photos',
                    'Professional lighting',
                    'High-resolution images'
                ],
                'category' => 'Photography',
                'order' => 4,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Content Creation',
                'slug' => 'content-creation',
                'description' => 'Social media content and promotional materials',
                'price' => 600.00,
                'price_label' => 'Starting at',
                'duration' => 'Varies',
                'features' => [
                    'Social media content',
                    'Promotional materials',
                    'Branded campaigns',
                    'Content calendar planning',
                    'Engagement optimization'
                ],
                'category' => 'Content',
                'order' => 5,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Drone Work',
                'slug' => 'drone-work',
                'description' => 'Aerial perspectives of motorsport events',
                'price' => 400.00,
                'price_label' => 'Starting at',
                'duration' => '2-3 Hours',
                'features' => [
                    'Aerial photography',
                    'Unique vantage points',
                    '4K video capability',
                    '20 edited aerial shots',
                    'Event scale coverage'
                ],
                'category' => 'Aerial',
                'order' => 6,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Brand Storytelling',
                'slug' => 'brand-storytelling',
                'description' => 'Authentic narratives connecting brands with motorsport community',
                'price' => 1200.00,
                'price_label' => 'Starting at',
                'duration' => '1-2 Weeks',
                'features' => [
                    'Brand narrative development',
                    'Multi-platform content',
                    'Compelling visual stories',
                    'Community engagement',
                    'Full campaign management'
                ],
                'category' => 'Brand',
                'order' => 7,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Video Production',
                'slug' => 'video-production',
                'description' => 'Dynamic video content from event highlights to promotional campaigns',
                'price' => 1500.00,
                'price_label' => 'Starting at',
                'duration' => '1-3 Days',
                'features' => [
                    'Event highlight reels',
                    'Promotional campaigns',
                    'Professional editing',
                    '4K video quality',
                    'Music and effects',
                    'Multiple deliverables'
                ],
                'category' => 'Video',
                'order' => 8,
                'is_featured' => true,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            ServicePricing::create($service);
        }
    }
}
