<?php

namespace Database\Seeders;

use App\Models\ContactSetting;
use Illuminate\Database\Seeder;

class ContactSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactSetting::firstOrCreate([], [
            'email' => 'info@newwavemotorsport.com',
            'phone' => '',
            'address' => 'Lusaka, Zambia',
            'map_url' => null,
        ]);
    }
}
