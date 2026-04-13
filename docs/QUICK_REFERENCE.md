# Quick Reference Card

## Common Commands

### Start/Stop
```bash
docker-compose up -d          # Start
docker-compose down           # Stop
docker-compose restart        # Restart
```

### Rebuild (after code changes)
```bash
docker-compose down
docker-compose build --no-cache
docker-compose up -d
```

### Check Status
```bash
docker-compose ps             # Container status
docker-compose logs -f        # View logs
curl -I http://localhost:8003/vendor/livewire/livewire.js  # Test Livewire
```

### Artisan Commands
```bash
docker-compose exec app php artisan <command>

# Examples:
docker-compose exec app php artisan migrate --force
docker-compose exec app php artisan optimize:clear
docker-compose exec app php artisan vendor:publish --tag=livewire:assets --force
```

## URLs

- **Local**: http://localhost:8003
- **Livewire JS**: http://localhost:8003/vendor/livewire/livewire.js
- **Uploaded Files**: http://localhost:8003/storage/filename.jpg

## File Locations

- **Host Assets**: `../assets/book_publisher/`
- **Public Dir**: `./public/`
- **Storage**: `./storage/`
- **Logs**: `./storage/logs/`

## Quick Fixes

### Livewire 404
```bash
docker-compose down
docker-compose build --no-cache
docker-compose up -d
```

### Clear Cache
```bash
docker-compose exec app php artisan optimize:clear
```

### Fix Permissions
```bash
chmod -R 775 ../assets/book_publisher
```
