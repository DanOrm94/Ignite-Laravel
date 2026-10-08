#!/usr/bin/env bash
# One-time setup for a GitHub Codespaces / dev-container preview of the
# Ignite Talent Group Laravel site. Uses SQLite so no external database
# is needed just to see the site render.
set -euo pipefail

echo "==> Installing PHP dependencies (composer install)"
composer install --no-interaction --prefer-dist

echo "==> Preparing environment"
if [ ! -f .env ]; then
  cp .env.example .env
fi

# Use a local SQLite file for the preview instead of RDS MySQL.
touch database/database.sqlite
php -r '
$path = ".env";
$env = file_get_contents($path);
$set = function ($env, $key, $value) {
    if (preg_match("/^".preg_quote($key, "/")."=.*/m", $env)) {
        return preg_replace("/^".preg_quote($key, "/")."=.*/m", $key."=".$value, $env);
    }
    return $env.PHP_EOL.$key."=".$value;
};
$env = $set($env, "DB_CONNECTION", "sqlite");
$env = $set($env, "DB_DATABASE", getcwd()."/database/database.sqlite");
$env = $set($env, "SESSION_DRIVER", "file");
$env = $set($env, "CACHE_STORE", "file");
$env = $set($env, "QUEUE_CONNECTION", "sync");
$env = $set($env, "MAIL_MAILER", "log");
$env = $set($env, "ADMIN_EMAIL", "admin@example.com");
$env = $set($env, "ADMIN_PASSWORD", "password");
file_put_contents($path, $env);
'

echo "==> Generating app key"
php artisan key:generate --force

echo "==> Running migrations + seeding the admin user"
php artisan migrate --force --seed

echo "==> Clearing caches"
php artisan optimize:clear

echo "==> Setup complete. The site will start on port 8000."
echo "    Admin login: admin@example.com / password"
