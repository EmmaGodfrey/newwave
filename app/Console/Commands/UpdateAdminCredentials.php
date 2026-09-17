<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateAdminCredentials extends Command
{
    protected $signature = 'admin:credentials {email : Existing trusted account email} {--new-email= : Replacement account email}';

    protected $description = 'Update one selected admin account using a hidden password prompt';

    public function handle(): int
    {
        $user = User::where('email', $this->argument('email'))->first();
        if (! $user) {
            $this->error('No account found with that email.');
            return self::FAILURE;
        }

        $email = $this->option('new-email') ?: $user->email;
        $validator = Validator::make(['email' => $email], [
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
        ]);
        if ($validator->fails()) {
            $this->error($validator->errors()->first());
            return self::FAILURE;
        }

        $password = $this->secret('New password (at least 12 characters)');
        if (strlen($password ?? '') < 12 || $password !== $this->secret('Confirm new password')) {
            $this->error('Passwords must match and contain at least 12 characters.');
            return self::FAILURE;
        }

        if ($email !== $user->email) {
            $user->email_verified_at = null;
        }
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->remember_token = Str::random(60);
        $user->is_admin = true;
        $user->save();
        $this->info('Admin credentials updated. Existing remember-me tokens have been revoked.');

        return self::SUCCESS;
    }
}
