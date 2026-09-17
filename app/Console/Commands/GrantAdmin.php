<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class GrantAdmin extends Command
{
    protected $signature = 'admin:grant {email : Email of an existing trusted staff account}';

    protected $description = 'Grant admin access to one explicitly selected existing account';

    public function handle(): int
    {
        $user = User::where('email', $this->argument('email'))->first();
        if (! $user) {
            $this->error('No account found with that email.');
            return self::FAILURE;
        }

        $user->is_admin = true;
        $user->save();
        $this->info('Admin access granted.');

        return self::SUCCESS;
    }
}
