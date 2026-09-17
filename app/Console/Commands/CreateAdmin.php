<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateAdmin extends Command
{
    protected $signature = 'admin:create {email} {--name= : Staff member name}';

    protected $description = 'Create a staff account using a hidden password prompt';

    public function handle(): int
    {
        $data = ['email' => $this->argument('email'), 'name' => $this->option('name') ?: $this->ask('Name')];
        $validator = Validator::make($data, ['email' => 'required|email|max:255|unique:users,email', 'name' => 'required|string|max:255']);
        if ($validator->fails()) {
            $this->error($validator->errors()->first());
            return self::FAILURE;
        }

        $password = $this->secret('Password (at least 12 characters)');
        if (strlen($password ?? '') < 12 || $password !== $this->secret('Confirm password')) {
            $this->error('Passwords must match and contain at least 12 characters.');
            return self::FAILURE;
        }

        $user = new User($data);
        $user->password = Hash::make($password);
        $user->is_admin = true;
        $user->save();
        $this->info('Admin account created.');
        return self::SUCCESS;
    }
}
