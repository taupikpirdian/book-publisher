# 🚀 Quick Deploy to Production
### Step 1: Jalankan Deploy Script

```bash
# Buat executable (hanya pertama kali)
chmod +x deploy.sh

# Jalankan deploy
./deploy.sh
```

### Step 2: Copy Asset
```bash
docker cp public/js e2e7f170b9da:/var/www/public/js
```
