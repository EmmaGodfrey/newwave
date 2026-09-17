#!/usr/bin/env bash
set -Eeuo pipefail
umask 0027
base=/var/www/newwave-deploy
release_id=${1:?Release ID required}
[[ "$release_id" =~ ^[a-f0-9]{40}-[0-9]+-[0-9]+$ ]] || { echo 'Invalid release ID'; exit 1; }
exec 9>"$base/deploy.lock"
flock -n 9 || { echo 'Another deployment is running'; exit 1; }
release="$base/releases/$release_id"
archive="$base/incoming/$release_id.tar.gz"
[[ ! -e "$release" && -f "$archive" && -f "$base/shared/.env" && -L "$base/current" ]]
previous=$(readlink -f "$base/current")
maintenance=0
switched=0
recover() {
    result=$?
    trap - EXIT
    set +e
    if (( result != 0 )); then
        if (( switched )); then
            ln -sfn "$previous" "$base/current.next"
            mv -Tf "$base/current.next" "$base/current"
            sudo /usr/bin/systemctl reload php8.3-fpm
        fi
        if (( maintenance )); then (cd "$previous" && php8.3 artisan up); fi
        echo 'Deployment failed. Previous code retained; database changes are not automatically reversed.' >&2
    fi
    exit "$result"
}
trap recover EXIT
mkdir "$release"
tar --no-same-owner -xzf "$archive" -C "$release"
[[ "$(cat "$release/.release-id")" == "$release_id" ]]
ln -s "$base/shared/.env" "$release/.env"
ln -s "$base/shared/storage" "$release/storage"
ln -s "$base/shared/storage/app/public" "$release/public/storage"
mkdir -p "$release/bootstrap/cache"
chgrp -R www-data "$release"
chmod -R g+rX "$release"
chmod 2770 "$release/bootstrap/cache"
cd "$release"
php8.3 /usr/local/bin/composer check-platform-reqs --no-dev
php8.3 artisan package:discover --no-ansi
php8.3 deploy/preflight.php
backup="$base/backups/$release_id"
mkdir -m 700 "$backup"
(cd "$previous" && php8.3 artisan down --retry=60)
maintenance=1
php8.3 deploy/backup.php "$backup"
php8.3 artisan migrate --force --no-interaction
php8.3 deploy/admin.php
php8.3 artisan config:cache
php8.3 artisan route:cache
php8.3 artisan view:cache
ln -sfn "$previous" "$base/previous.next"
mv -Tf "$base/previous.next" "$base/previous"
ln -sfn "$release" "$base/current.next"
mv -Tf "$base/current.next" "$base/current"
switched=1
sudo /usr/bin/systemctl reload php8.3-fpm
php8.3 artisan up
maintenance=0
for path in / /login /contact /privacy-policy /sitemap.xml; do
    curl --fail --silent --show-error --retry 3 --retry-delay 2 --max-time 20 \
        --resolve newwavemotorsport.com:443:127.0.0.1 "https://newwavemotorsport.com$path" > /dev/null
done
echo "Activated $release_id. Backup: $backup"
# Releases and backups are deliberately retained; prune only after confirming a restore point.
