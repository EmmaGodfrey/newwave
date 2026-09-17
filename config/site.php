<?php

return [
    'url' => env('SITE_URL', 'https://newwavemotorsport.com'),
    'business_name' => env('SITE_BUSINESS_NAME', 'NewWave Motorsport'),
    'privacy_email' => env('SITE_PRIVACY_EMAIL'),
    'policy_version' => '2026-09-17',
    // Enable only after checking authenticity and permission for every published review.
    'testimonials_verified' => env('SITE_TESTIMONIALS_VERIFIED', false),
];
