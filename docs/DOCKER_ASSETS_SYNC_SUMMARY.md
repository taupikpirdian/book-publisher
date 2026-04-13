# Docker Assets Sync - Setup Complete ✓

## Ringkasan Perubahan

### 1. **docker-compose.yml**
- ✓ Volume `app_storage_book_publisher` diganti dengan bind mount ke `../assets/book_publisher`
- ✓ Both `app` dan `nginx` services now mount the same assets directory
- ✓ Removed unused `app_storage_book_publisher` volume

### 2. **Dockerfile**
- ✓ Added `php artisan storage:link` command
- ✓ Assets will be properly symlinked on build

### 3. **docker/nginx.conf**
- ✓ Added `/storage/` location block to serve uploaded assets

### 4. **setup-assets.sh**
- ✓ Helper script to create assets directory

### 5. **docs/ASSETS_SETUP.md**
- ✓ Documentation for assets setup

## Struktur File

```
~/MyWork/apps/php/
├── assets/
│   └── book_publisher/          ← Upload akan disimpan di sini
│       ├── images/
│       ├── documents/
│       └── ...
│
└── book-publisher/
    ├── docker-compose.yml
    ├── Dockerfile
    ├── setup-assets.sh
    └── storage/app/public → ../assets/book_publisher (symlink di runtime)
```

## Cara Menggunakan

### 1. First Time Setup

```bash
cd /Users/macbook/MyWork/apps/php/book-publisher
./setup-assets.sh
```

### 2. Rebuild Containers

```bash
docker-compose down
docker-compose up --build -d
```

### 3. Verify Setup

```bash
# Check if directory is mounted
docker exec book-publisher ls -la /var/www/storage/app/public/

# Check nginx can access assets
curl http://localhost:8003/storage/test.txt
```

### 4. Upload Files

Files uploaded through Filament or Laravel will automatically sync to host:

```php
// In your controllers/Filament forms
$path = $request->file('image')->store('public/images');
// File saved to: ../assets/book_publisher/images/filename.jpg
```

### 5. Access Files

Uploaded files accessible via:
```
http://localhost:8003/storage/images/filename.jpg
https://penerbitskt.naramakna.id/storage/images/filename.jpg
```

## Testing

1. Upload a file through your app (Filament or regular upload)
2. Check host directory:
   ```bash
   ls -la ../assets/book_publisher/
   ```
3. Access via browser:
   ```
   http://localhost:8003/storage/your-file.jpg
   ```

## Production Deployment

For production server (`penerbitskt.naramakna.id`):

```bash
# On production server
cd /path/to/book-publisher
mkdir -p ../assets/book_publisher
chmod -R 775 ../assets/book_publisher

docker-compose down
docker-compose up --build -d
```

## Benefits

✓ **Persistent Storage**: Files survive container rebuilds
✓ **Easy Backup**: Simply backup `../assets/book_publisher` folder
✓ **Direct Access**: Can manage files directly from host
✓ **Fast Deployment**: No need to copy files in/out of containers
✓ **Development Friendly**: See uploaded files immediately on host
