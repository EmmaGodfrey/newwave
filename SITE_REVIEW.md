# Newwave reconciliation and code review

> This records the initial findings. The follow-up fixes are implemented locally:
> explicit admin authorization, closed registration, working blog and portfolio
> routes, validated contact input, test isolation, and navigation/content cleanup.
> See DEPLOYMENT.md for the current CI/CD setup. Findings below are historical;
> the September sweep also upgraded vulnerable dependencies, added session
> invalidation, and prepared release/backup infrastructure on the server.

Reviewed 2026-09-17 against the local checkout and the deployment on
178.104.123.31 at `/var/www/newwave`.

## Reconciliation

- Copied the production `composer.lock` into this checkout. It includes Laravel
  12.56.0 and Livewire 4.2.3, among other dependency changes. PHP 8.3 is required
  by the locked dependencies even though composer.json currently permits 8.2.
- Adopted production's migration name
  `2026_01_18_190000_create_blog_categories_table.php`. Its contents are identical
  to the former `2026_01_23_100000_create_blog_categories_table.php`; moving it
  earlier creates categories before the blogs foreign key. Production records
  the earlier filename as already run. Other existing databases must have their
  migration history checked before using this rename, to avoid duplicate creation.
- Most production Git differences are executable permission changes. With
  `core.fileMode=false` applied only to inspection commands, the remaining tracked
  differences were the lockfile and migration rename. No permissions were changed.
- Production also contains an untracked `.env.save`. It was not copied or read.
- The pre-existing local `public/assets/css/app.css` edit was preserved.
- No production files, dependencies, database records, or deployment configuration
  were changed. These reconciliation edits are local and uncommitted.

## Findings, in priority order

1. **Critical: public registration grants admin access.** `routes/web.php:18`
   enables registration, while line 39 protects all administration with only
   `auth`. There is no admin role in `app/Models/User.php`. In an isolated in-memory
   database, a freshly created ordinary user received HTTP 200 from `/admin`.
   The live `/register` page returns 200. Disable public registration for this
   staff-only CMS and review existing accounts; if public accounts are intended,
   introduce explicit admin authorization instead. No live account was created.
2. **High: blog search is broken.** The live
   `/blog/search?search=test` returns 500. Both `search()` and `category()` in
   `app/Http/Controllers/BlogController.php` render a template that iterates
   `$testimonials` without supplying that variable (lines 162 and 120).
3. **High: routes reference missing handlers and templates.** The public portfolio
   category controller renders nonexistent `frontend.pages.portfolio-category`.
   Missing admin views include `admin.blogs.show`,
   `admin.portfolio.categories.show`, and all four portfolio image views
   (`index`, `create`, `show`, `edit`). Resource routes also expose nonexistent
   `show` methods on users, blog categories, team members, testimonials, service
   pricing, and FAQs. Implement the intended screens or remove unused routes.
4. **Medium: contact submissions can set staff read status.**
   `ContactController.php:37` passes all request input to `ContactMessage::create`,
   and `is_read` is fillable. Use only validated fields so a public sender cannot
   mark their own submission as read. The route also has no explicit throttle.
5. **Medium: blog navigation loses filters.** Search pagination does not preserve
   the search query. Archive links send `?month=...`, but `index()` never applies
   that filter, so all posts are returned.
6. **Medium: the current test setup is not self-contained.** Only two example
   tests exist. Running them against an isolated empty SQLite database yields one
   pass and one failure: the home-page test does not run migrations and fails on
   the missing testimonials table. It imports but does not use RefreshDatabase.
   PHPUnit also reports a deprecated configuration schema. Configure an isolated
   test database, migrate fixtures, and add coverage for authorization and pages.

## Validation and limits

- Composer metadata validates. A PHP 8.3 Composer install dry run accepts the
  copied lockfile; the default PHP 8.2 runtime rejects it. Dependencies were not
  installed or updated locally, so local execution used the existing vendor tree.
- All 88 PHP files under app, routes, and database passed PHP 8.3 syntax checks.
- All 14 migrations ran successfully against a disposable in-memory SQLite
  database. Production reports all 14 migrations as already run. This does not
  replace testing a fresh migration on the production database engine.
- Live GET checks returned 200 for home, about, services, portfolio, blog,
  contact, pricing, team, FAQ, testimonials, and registration. Unauthenticated
  `/admin` redirects (302); blog search returns 500.
- Review covered routing, authentication, public controllers, selected admin
  write paths, dependencies, migrations, and basic HTTP availability. Browser
  interaction, authenticated production writes, mail delivery, dependency advisory
  auditing, and full visual checks were not performed.

Address admin access first, then the broken routes and test setup before enabling
automatic deployment. Preserve production environment settings and uploaded media
when constructing the deployment workflow.
