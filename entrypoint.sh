#!/bin/bash

# Ensure the SQLite database file exists
DB_PATH="/var/www/html/database/database.sqlite"

if [ ! -f "$DB_PATH" ]; then
  echo "Creating SQLite database file at $DB_PATH"
  touch "$DB_PATH"
  chown www-data:www-data "$DB_PATH"
fi

# Set correct permissions for storage and bootstrap cache
echo "Setting permissions for storage and bootstrap/cache"
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Run Laravel migrations
echo "Running Laravel migrations..."
php artisan migrate --force

# Start Apache in the foreground
echo "Starting Apache..."
apache2-foreground
