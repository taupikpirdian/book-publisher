# URGENT: Fix Livewire 404 di Production Server

## Masalah
Livewire assets returns 404 di production server meskipun sudah ada di local.

## Penyebab
Server production belum menggunakan kode terbaru yang berisi fix Docker configuration.

## Solusi - Deploy ke Production

### Option 1: Quick Fix (Recommended)

```bash
# 1. SSH ke production server
ssh root@naramakna

# 2. Masuk ke direktori app
cd /home/naramakna/apps/book-publisher

# 3. Pull kode terbaru
git pull origin main

# 4. Jalankan fix script
chmod +x fix-livewire-404.sh
./fix-livewire-404.sh

# 5. Clear Cloudflare cache via dashboard atau API

# 6. Test
curl -I https://penerbitskt.naramakna.id/vendor/livewire/livewire.js
```

### Option 2: Manual Fix

```bash
# 1. SSH ke production server
ssh root@naramakna
cd /home/naramakna/apps/book-publisher

# 2. Pull latest code
git pull origin main

# 3. Setup assets directory
mkdir -p ../assets/book_publisher
chmod -R 775 ../assets/book_publisher

# 4. Publish Livewire assets
php artisan vendor:publish --tag=livewire:assets --force

# 5. Verify assets
ls -la public/vendor/livewire/

# 6. Stop containers
docker-compose down

# 7. Remove old volumes
docker volume rm book-publisher_app_livewire_book_publisher 2>/dev/null || true
docker volume prune -f

# 8. Rebuild containers
docker-compose build --no-cache

# 9. Start containers
docker-compose up -d

# 10. Wait and verify
sleep 5
docker exec book-publisher-nginx ls -la /var/www/public/vendor/livewire/

# 11. Test locally
curl -I http://localhost:8003/vendor/livewire/livewire.js

# 12. Test from production URL
curl -I https://penerbitskt.naramakna.id/vendor/livewire/livewire.js
```

## Jika Masih 404 Setelah Deploy

### Check 1: Verify assets di container
```bash
docker exec book-publisher-nginx ls -la /var/www/public/vendor/livewire/
```

Harusnya ada file-file JS:
- livewire.js
- livewire.min.js
- livewire.csp.js
- dll

### Check 2: Cek Nginx config
```bash
docker exec book-publisher-nginx cat /etc/nginx/conf.d/default.conf
```

Harusnya ada location block:
```nginx
location /vendor/livewire/ {
    expires 1y;
    add_header Cache-Control "public, immutable";
    try_files $uri =404;
}
```

### Check 3: Cek Nginx logs
```bash
docker-compose logs nginx | tail -50
```

### Check 4: Clear Cloudflare Cache

Cloudflare mungkin masih cache response 404 yang lama.

**Via Dashboard:**
1. Login ke Cloudflare
2. Pilih domain: penerbitskt.naramakna.id
3. Caching > Configuration
4. Purge Everything

**Via API:**
```bash
curl -X POST "https://api.cloudflare.com/client/v4/zones/YOUR_ZONE_ID/purge_cache" \
     -H "Authorization: Bearer YOUR_API_TOKEN" \
     -H "Content-Type: application/json" \
     --data '{"purge_everything":true}'
```

### Check 5: Bypass Cloudflare Cache

Test dengan bypass cache:
```bash
curl -I -H "Cache-Control: no-cache" https://penerbitskt.naramakna.id/vendor/livewire/livewire.js
```

Atau test direct ke IP server:
```bash
curl -I http://SERVER_IP:8003/vendor/livewire/livewire.js
```

## Verification Checklist

- [ ] Code terbaru sudah di-pull (`git pull`)
- [ ] Containers sudah di-rebuild (`docker-compose build --no-cache`)
- [ ] Livewire assets ada di container (`ls -la /var/www/public/vendor/livewire/`)
- [ ] Nginx config sudah benar (ada location block `/vendor/livewire/`)
- [ ] Cloudflare cache sudah di-clear
- [ ] Test local berhasil (`curl -I http://localhost:8003/vendor/livewire/livewire.js` → 200)
- [ ] Test production berhasil (`curl -I https://penerbitskt.naramakna.id/vendor/livewire/livewire.js` → 200)

## Expected Result

Setelah fix, harusnya dapat HTTP 200:

```
HTTP/2 200 
content-type: application/javascript
cache-control: max-age=14400
cf-cache-status: MISS
```

Bukan lagi 404!
