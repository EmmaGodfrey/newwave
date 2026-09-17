<?php

require __DIR__.'/../vendor/autoload.php';
$app = require __DIR__.'/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
$directory = $argv[1] ?? '';
if (!is_dir($directory) || !str_starts_with(realpath($directory), '/var/www/newwave-deploy/backups/')) throw new RuntimeException('Invalid backup directory.');
umask(0077);
$connection = Illuminate\Support\Facades\DB::connection()->getConfig();
$temporary = tempnam($directory, 'mysql-');
$quote = fn ($value) => '"'.str_replace(['\\', '"', "\n", "\r"], ['\\\\', '\\"', '\\n', '\\r'], (string) $value).'"';
$options = "[client]\n";
foreach (['host', 'port', 'user', 'password', 'socket'] as $key) {
    $source = ['user' => 'username', 'socket' => 'unix_socket'][$key] ?? $key;
    if (!empty($connection[$source])) $options .= $key.'='.$quote($connection[$source])."\n";
}
file_put_contents($temporary, $options);
chmod($temporary, 0600);
$output = fopen($directory.'/database.sql', 'xb');
try {
    $process = new Symfony\Component\Process\Process(['mysqldump', '--defaults-extra-file='.$temporary, '--single-transaction', '--quick', '--skip-lock-tables', '--no-tablespaces', $connection['database']]);
    $process->setTimeout(300);
    $process->run(function ($type, $buffer) use ($output) {
        if ($type === Symfony\Component\Process\Process::OUT) fwrite($output, $buffer);
    });
    if (!$process->isSuccessful()) throw new RuntimeException('Database backup failed; release aborted.');
} finally {
    fclose($output);
    unlink($temporary);
}
copy(base_path('.env'), $directory.'/.env');
$archive = new Symfony\Component\Process\Process(['tar', '-czf', $directory.'/uploads.tar.gz', '-C', storage_path('app'), 'public']);
$archive->setTimeout(300);
$archive->mustRun();
echo "Database, environment and uploads backed up.\n";
