<?php

require __DIR__.'/../vendor/autoload.php';
$app = require __DIR__.'/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
$user = App\Models\User::where('email', config('admin.email'))->first();
if (!$user) {
    Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'UserSeeder', '--force' => true]);
    $user = App\Models\User::where('email', config('admin.email'))->firstOrFail();
}
if (!$user->is_admin) {
    $user->is_admin = true;
    $user->save();
}
// The bootstrap password is only needed once; do not retain it in runtime config.
$environment = base_path('.env');
$contents = file_get_contents($environment);
$contents = preg_replace('/^ADMIN_PASSWORD=.*\R?/m', '', $contents);
file_put_contents($environment, $contents, LOCK_EX);
echo "Selected administrator has access.\n";
