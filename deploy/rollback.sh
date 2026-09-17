#!/usr/bin/env bash
set -Eeuo pipefail
base=/var/www/newwave-deploy
exec 9>"$base/deploy.lock"
flock -n 9 || { echo 'Another deployment is running'; exit 1; }
previous=$(readlink -f "$base/previous")
[[ "$previous" == "$base/releases/"* || "$previous" == /var/www/newwave ]] || exit 1
[[ -f "$previous/artisan" ]]
ln -sfn "$previous" "$base/current.next"
mv -Tf "$base/current.next" "$base/current"
sudo /usr/bin/systemctl reload php8.3-fpm
(cd "$previous" && php8.3 artisan up)
curl --fail --silent --show-error --max-time 20 --resolve newwavemotorsport.com:443:127.0.0.1 https://newwavemotorsport.com/ > /dev/null
echo 'Previous code restored. Database changes remain; restore a database backup only after reviewing newer writes.'
