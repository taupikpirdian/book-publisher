# syntax=docker/dockerfile:1

FROM php:8.3-fpm AS app

WORKDIR /var/www

# System deps & Node.js
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libicu-dev \
    nodejs \
    npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_CACHE_DIR=/tmp/composer-cache

# Copy composer & package files FIRST
COPY composer.json composer.lock package.json ./

# Install vendor dependencies
RUN --mount=type=cache,target=/tmp/composer-cache \
    for attempt in 1 2 3; do \
        composer install \
            --no-dev \
            --prefer-dist \
            --optimize-autoloader \
            --no-interaction \
            --no-progress \
            --no-scripts && break; \
        if [ "$attempt" -eq 3 ]; then exit 1; fi; \
        echo "Composer install failed (attempt $attempt/3); retrying..."; \
        sleep $((attempt * 10)); \
    done

# Install npm dependencies
RUN --mount=type=cache,target=/root/.npm \
    npm install --no-audit --no-fund

# Copy app source
COPY . .

COPY docker/entrypoint.sh /usr/local/bin/entrypoint

# Clear package cache and build assets
RUN rm -f bootstrap/cache/packages.php \
    && php artisan package:discover --ansi || true

# Build frontend assets
RUN npm run build \
    && rm -rf node_modules

# Permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 storage bootstrap/cache \
    && chmod +x /usr/local/bin/entrypoint

# Increase PHP upload limits (default is 2MB)
RUN echo "upload_max_filesize = 50M" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "post_max_size = 50M" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "max_execution_time = 300" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "memory_limit = 256M" >> /usr/local/etc/php/conf.d/uploads.ini

EXPOSE 9000
ENTRYPOINT ["entrypoint"]
CMD ["php-fpm"]

FROM nginx:alpine AS nginx

COPY docker/nginx.conf /etc/nginx/conf.d/default.conf
COPY --from=app /var/www/public /var/www/public
