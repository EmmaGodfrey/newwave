<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_seeder_creates_admin_and_does_not_reset_existing_credentials(): void
    {
        config(['admin' => ['name' => 'Staff', 'email' => 'staff@example.test', 'password' => 'unique-test-password']]);
        $this->seed(UserSeeder::class);
        $user = User::firstOrFail();
        $this->assertTrue($user->is_admin);
        $this->assertTrue(Hash::check('unique-test-password', $user->password));
        $user->is_admin = false;
        $user->save();
        config(['admin.password' => 'another-test-password']);
        $this->seed(UserSeeder::class);
        $this->assertDatabaseCount('users', 1);
        $this->assertSame($user->password, $user->fresh()->password);
        $this->assertFalse($user->fresh()->is_admin);
    }

    public function test_seeder_skips_unconfigured_credentials(): void
    {
        config(['admin' => ['name' => 'Staff', 'email' => null, 'password' => null]]);
        $this->seed(UserSeeder::class);
        $this->assertDatabaseCount('users', 0);
    }

    public function test_seeder_rejects_a_short_password(): void
    {
        config(['admin' => ['name' => 'Staff', 'email' => 'staff@example.test', 'password' => 'short']]);
        try {
            $this->seed(UserSeeder::class);
            $this->fail('Expected invalid credentials to be rejected.');
        } catch (\Illuminate\Validation\ValidationException $exception) {
            $this->assertArrayHasKey('password', $exception->errors());
            $this->assertDatabaseCount('users', 0);
        }
    }
}
