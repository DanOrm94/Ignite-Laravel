#!/usr/bin/env bash
# Starts the preview server. If the one-time setup has not finished yet
# (e.g. postCreateCommand still running or interrupted), run it first so
# the server never boots without vendor/ or an app key present.
set -euo pipefail

if [ ! -f vendor/autoload.php ] || [ ! -f .env ]; then
  echo "==> Dependencies/environment not ready — running setup first."
  bash .devcontainer/setup.sh
fi

echo "==> Starting Ignite preview on http://0.0.0.0:8000"
php artisan serve --host=0.0.0.0 --port=8000
