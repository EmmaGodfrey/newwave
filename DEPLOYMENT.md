# NewWave deployment

NewWave uses GitHub Actions with the same production environment / SSH-secret
pattern as EGLabs and EGLeads. Their Docker commands are replaced with Laravel
release directories, persistent uploads, database backups and health checks.
Dwella Suite's current workflow is CI-only; its older backend deployment is commented out.

## Pipeline

`.github/workflows/deploy.yml` runs on main pushes, pull requests and manual runs.
It validates Composer metadata, audits production dependencies, checks PHP/JS/shell
syntax, runs PHP and consent tests, and compiles routes and templates. Runtime is
PHP 8.3; Node 22 runs the dependency-free JavaScript tests. Frontend assets are
versioned in `public/assets`; the legacy Mix build is not run during deployment,
so it cannot overwrite the reviewed public CSS/JavaScript.

Only successful main runs can deploy. `PROD_DEPLOY_ENABLED=true` enables the deploy
job, protected by the production environment's main-branch restriction. Deployments
are serialised and cannot cancel one another mid-release. A production build uses
locked, non-development Composer dependencies and omits environments, caches,
uploads, tests and Git metadata from the archive.

Production environment secrets: `PROD_SSH_PRIVATE_KEY`, `PROD_SSH_KNOWN_HOSTS`,
`PROD_SSH_HOST`, `PROD_SSH_USER`. A dedicated `newwave-deploy` Unix account is used;
its only sudo permission is reloading PHP 8.3 FPM. Host verification uses the
server's trusted SSH host key. Keys and initial admin credentials are outside Git.

## Server layout

- `/var/www/newwave-deploy/current` points at the active release.
- `releases/<commit>-<run>-<attempt>` contains immutable application code/vendor.
- `shared/.env` holds production settings; application keys are preserved.
- `shared/storage` points at `/var/www/newwave/storage`, preserving existing files.
- `backups/<release>` contains database SQL, environment and uploaded-file archive.
- `previous` points at the preceding release; the original manual application at
  `/var/www/newwave` remains available as the first rollback target.
- Nginx serves `current/public` and resolves the PHP script's real filesystem path.
- `bin/release.sh` and `bin/rollback.sh` are installed copies of the reviewed scripts
  in `deploy/`. Update these installed copies deliberately when changing deployment
  behaviour; uploading an application release does not replace them automatically.

Preflight rejects debug mode, missing keys/admin bootstrap details, unsupported
backup databases, or unreconciled migration history. The site briefly enters
maintenance while the database/uploads are backed up and additive migrations run.
The selected admin is created/granted access; its bootstrap password is then removed
from the environment. Routes/config/views are cached before the symlink is switched.
The home, login, contact, privacy and sitemap routes must all return successful HTTP
responses. A failure restores the previous code and exits maintenance.

Database migrations are NOT automatically reversed. Review data written since the
backup before manually restoring it. Future migrations must remain compatible with
the previous release, or require a separately planned maintenance release. Backups
and releases are retained until an operator reviews them for pruning; monitor disk
space. Server-local backups should also be copied to approved independent storage.

Manual code rollback on the server:

```sh
sudo -u newwave-deploy bash /var/www/newwave-deploy/bin/rollback.sh
```

## Admin and database history

Production already records `2026_01_18_190000_create_blog_categories_table`. An older
local database might record `2026_01_23_100000_create_blog_categories_table` instead.
Reconcile that history before migrating; do not attempt to recreate the table.
The new migrations add explicit admin permissions and contact consent metadata.

The user-selected initial production admin is `emmanuekgodfrey4@gmail.com`.
Registration stays disabled and all admin routes require explicit access.
Create another admin with `php artisan admin:create EMAIL`, grant an existing
account with `php artisan admin:grant EMAIL`, or rotate credentials privately with
`php artisan admin:credentials EMAIL`. The environment-driven UserSeeder creates
new accounts only and never overwrites an existing account's password.

## Verification and operational follow-up

Use PHP 8.3 locally:

```sh
composer install
php vendor/bin/phpunit
node --test tests/js/*.test.cjs
composer audit --locked --no-dev
```

The dependency sweep upgraded the formerly reconciled lockfile to patched versions;
Composer no longer reports the 46 advisories found in the previous lockfile.
Production debug output is disabled and HTTPS-only session cookies are enabled
in the shared environment. Verify real SMTP delivery separately; tests use fake or
local log transports and do not email users. See `ANALYTICS.md` for Google-side
Enhanced Measurement settings, and `PRIVACY_SEO_REVIEW.md` for unresolved business
identity/retention/image-permission details. This release is not a legal certification.
