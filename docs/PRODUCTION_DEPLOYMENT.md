# Production Deployment Guide

## Deploy ke Server Production (penerbitskt.naramakna.id)

### Prerequisites

Pastikan di server production sudah ter-install:
- Docker & Docker Compose
- Git
- PHP dependencies (handled by Docker)

### Step-by-Step Deployment

#### Option 1: Menggunakan Deploy Script (Recommended)

```bash
# 1. SSH ke server production
ssh user@penerbitskt.naramakna.id

# 2. Pull latest code
cd /path/to/book-publisher
git pull origin main

# 3. Install dependencies & setup
composer install --optimize-autoloader --no-dev
./setup-assets.sh

# 4. Run deploy script
./deploy.sh
```

#### Option 2: Manual Deployment

```bash
# 1. SSH ke server production
ssh user@penerbitskt.naramakna.id

# 2. Pull latest code
cd /path/to/book-publisher
git pull origin main

# 3. Install dependencies
composer install --optimize-autoloader --no-dev

# 4. Setup assets directory
mkdir -p ../assets/book_publisher
chmod -R 775 ../assets/book_publisher

# 5. Publish Livewire assets
php artisan vendor:publish --tag=livewire:assets --force

# 6. Create storage symlink
php artisan storage:link

# 7. Clear cache
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# 8. Rebuild and restart containers
docker-compose down
docker-compose build --no-cache
docker-compose up -d

# 9. Run migrations (if needed)
docker-compose exec app php artisan migrate --force
```

### Fix Livewire 404 Error di Production

Jika masih ada error 404 untuk Livewire assets:

```bash
# 1. SSH ke server
ssh user@penerbitskt.naramakna.id

# 2. Publish Livewire assets
cd /path/to/book-publisher
php artisan vendor:publish --tag=livewire:assets --force

# 3. Verify assets exist
ls -la public/vendor/livewire/

# 4. Set correct permissions
chmod -R 775 public/vendor/livewire
chown -R www-data:www-data public/vendor/livewire

# 5. Restart nginx
docker-compose restart nginx
```

### Verifikasi Deployment

```bash
# Check if containers are running
docker-compose ps

# Check Livewire assets
curl -I http://localhost:8003/vendor/livewire/livewire.js

# Check uploaded assets directory
ls -la ../assets/book_publisher/

# Check logs
docker-compose logs -f app
docker-compose logs -f nginx
```

### Troubleshooting

#### Livewire Assets 404

```bash
# Re-publish assets
php artisan vendor:publish --tag=livewire:assets --force

# Verify in container
docker-compose exec app ls -la /var/www/public/vendor/livewire/

# Check nginx config
docker-compose exec nginx cat /etc/nginx/conf.d/default.conf
```

#### Uploaded Assets Not Syncing

```bash
# Check volume mount
docker-compose exec app ls -la /var/www/storage/app/public/

# Check host directory
ls -la ../assets/book_publisher/

# Fix permissions
chmod -R 775 ../assets/book_publisher
```

#### Cache Issues

```bash
# Clear all cache
php artisan optimize:clear

# Re-optimize
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Environment Variables

Pastikan `.env` di production sudah benar:

```env
APP_NAME="Penerbit SKT"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://penerbitskt.naramakna.id

DB_CONNECTION=mysql
DB_HOST=db_host
DB_PORT=3306
DB_DATABASE=book_publisher
DB_USERNAME=username
DB_PASSWORD=password

FILESYSTEM_DISK=public
```

### Backup Uploaded Assets

```bash
# Backup assets folder
tar -czf book_publisher_assets_$(date +%Y%m%d).tar.gz ../assets/book_publisher/

# Or use rsync for incremental backup
rsync -avz ../assets/book_publisher/ /backup/location/book_publisher_assets/
```

### Rollback

Jika ada masalah dan perlu rollback:

```bash
# Stop containers
docker-compose down

# Checkout previous version
git checkout <previous-commit-hash>

# Rebuild
docker-compose build --no-cache
docker-compose up -d

# Rollback migrations (if needed)
docker-compose exec app php artisan migrate:rollback
```

### Monitoring

```bash
# View logs
docker-compose logs -f

# View only nginx logs
docker-compose logs -f nginx

# View only app logs
docker-compose logs -f app

# Check container stats
docker stats
```
