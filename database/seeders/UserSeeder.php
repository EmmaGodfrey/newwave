<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $credentials = config('admin');

        if (empty($credentials['email']) && empty($credentials['password'])) {
            $this->command?->warn('User seeding skipped: set ADMIN_EMAIL and ADMIN_PASSWORD.');
            return;
        }

        Validator::make($credentials, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:12'],
        ])->validate();

        if (User::where('email', $credentials['email'])->exists()) {
            $this->command?->warn('Account already exists; use admin:credentials to change its login.');
            return;
        }

        $user = new User([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password']),
        ]);
        $user->is_admin = true;
        $user->save();
        $this->command?->info('Admin account created.');
    }
}
