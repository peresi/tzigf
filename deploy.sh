#!/usr/bin/env bash

set -euo pipefail

BRANCH="${1:-main}"

if [[ ! -f artisan ]]; then
    echo "Error: artisan not found. Run this script from the Laravel project root."
    exit 1
fi

if ! command -v php >/dev/null 2>&1; then
    echo "Error: php command not found in PATH."
    exit 1
fi

echo "==> Deploying branch: ${BRANCH}"

echo "==> Fetching latest code"
git fetch origin

echo "==> Pulling latest code (fast-forward only)"
git pull --ff-only origin "${BRANCH}"

echo "==> Clearing Laravel caches"
php artisan optimize:clear

echo "==> Running database migrations"
php artisan migrate --force

echo "==> Rebuilding optimized caches"
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "==> Ensuring public storage symlink exists"
php artisan storage:link || true

echo "==> Deployment completed successfully"
