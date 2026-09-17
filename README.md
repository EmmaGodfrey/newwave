# NewWave Motorsport

Laravel application for the NewWave Motorsport website and staff content management.
Requires **PHP 8.3+** and Composer. Frontend assets are included under `public/assets`.

## Local setup

```sh
composer install
cp .env.example .env
php artisan key:generate
# Set the database connection in .env before migrating.
php artisan migrate
php artisan storage:link
php artisan admin:create staff@example.com --name="Staff name"
php artisan serve
```

The admin command prompts privately for a password. Public registration is disabled.
Existing trusted accounts can be promoted with `php artisan admin:grant EMAIL`.

```sh
php vendor/phpunit/phpunit/phpunit
```

Tests use an isolated in-memory SQLite database. The production database is not used.
For changes to compiled assets, the existing Laravel Mix build uses `npm ci` and
`npm run production`. Blade and public JavaScript edits do not need a Mix rebuild.

See [DEPLOYMENT.md](DEPLOYMENT.md) for the reconciled production migration history,
admin access setup, persistent uploads, and release checks. Initial review findings
are recorded in [SITE_REVIEW.md](SITE_REVIEW.md).
