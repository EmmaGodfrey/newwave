<?php

require __DIR__.'/../vendor/autoload.php';
$app = require __DIR__.'/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

if (config('app.debug') || config('app.env') !== 'production' || !config('app.key')) {
    throw new RuntimeException('Require APP_ENV=production, APP_DEBUG=false and an existing APP_KEY.');
}
if (config('database.default') !== 'mysql') throw new RuntimeException('This deployment backup supports MySQL only.');
$old = '2026_01_23_100000_create_blog_categories_table';
if (Illuminate\Support\Facades\DB::table('migrations')->where('migration', $old)->exists()) {
    throw new RuntimeException('Reconcile the blog-category migration history before deploying.');
}
if (!filter_var(config('admin.email'), FILTER_VALIDATE_EMAIL)) throw new RuntimeException('Set ADMIN_EMAIL to the selected production admin.');
$user = App\Models\User::where('email', config('admin.email'))->first();
if (!$user && strlen(config('admin.password') ?? '') < 12) throw new RuntimeException('First admin needs an initial ADMIN_PASSWORD of at least 12 characters.');
echo "Production preflight passed.\n";
