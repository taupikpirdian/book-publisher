# 🚀 Quick Deploy to Production

## Masalah
Livewire assets 404 di production server.

## Solusi

### Step 1: SSH ke Production Server

```bash
ssh root@naramakna
```

### Step 2: Masuk ke Direktori App

```bash
cd /home/naramakna/apps/book-publisher
```

### Step 3: Jalankan Deploy Script

```bash
# Buat executable (hanya pertama kali)
chmod +x deploy-production.sh

# Jalankan deploy
./deploy-production.sh
```

### Step 4: Clear Cloudflare Cache

**PENTING!** Cloudflare mungkin masih cache response 404 yang lama.

**Option A - Via Dashboard:**
1. Login ke https://dash.cloudflare.com
2. Pilih domain: penerbitskt.naramakna.id
3. Menu: **Caching** → **Configuration**
4. Klik **Purge Everything**

**Option B - Via API:**
```bash
curl -X POST "https://api.cloudflare.com/client/v4/zones/YOUR_ZONE_ID/purge_cache" \
     -H "Authorization: Bearer YOUR_API_TOKEN" \
     -H "Content-Type: application/json" \
     --data '{"purge_everything":true}'
```

### Step 5: Test

```bash
# Test di server
curl -I https://penerbitskt.naramakna.id/vendor/livewire/livewire.js

# Harusnya dapat HTTP 200 (bukan 404)
```

## Jika Masih Error

Lihat panduan lengkap di: `docs/URGENT_FIX_LIVEWIRE_404.md`

### Quick Troubleshooting

```bash
# 1. Cek apakah containers running
docker-compose ps

# 2. Cek assets di container
docker exec book-publisher-nginx ls -la /var/www/public/vendor/livewire/

# 3. Cek logs
docker-compose logs nginx | tail -50

# 4. Bypass Cloudflare cache
curl -I -H "Cache-Control: no-cache" https://penerbitskt.naramakna.id/vendor/livewire/livewire.js
```

## Expected Result

Setelah deploy + clear Cloudflare cache:

```
HTTP/2 200 
content-type: application/javascript
cache-control: max-age=14400
```

✅ **Bukan lagi 404!**
