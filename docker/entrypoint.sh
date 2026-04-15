#!/bin/bash

# Copy Livewire assets from vendor to public if not exists
if [ ! -d "/var/www/public/vendor/livewire" ] || [ -z "$(ls -A /var/www/public/vendor/livewire)" ]; then
    echo "📦 Publishing Livewire assets..."
    php artisan vendor:publish --tag=livewire:assets --force
    chown -R www-data:www-data /var/www/public/vendor/livewire
    echo "✓ Livewire assets published"
fi

# Copy public/js assets if not exists
if [ ! -d "/var/www/public/js" ] || [ -z "$(ls -A /var/www/public/js)" ]; then
    echo "📦 Copying public/js assets..."
    mkdir -p /var/www/public/js
    cp -r /var/www/vendor/laravel/framework/src/illuminate/Foundation/resources/js/* /var/www/public/js/ 2>/dev/null || true
    chown -R www-data:www-data /var/www/public/js
    echo "✓ Public/js assets copied"
fi

# Create storage link if not exists
if [ ! -L "/var/www/public/storage" ]; then
    echo "🔗 Creating storage symlink..."
    php artisan storage:link
    echo "✓ Storage link created"
fi

# Set permissions
chown -R www-data:www-data /var/www/public/vendor/livewire 2>/dev/null || true
chown -R www-data:www-data /var/www/public/js 2>/dev/null || true

# Execute the CMD
exec "$@"
