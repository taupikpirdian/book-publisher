#!/bin/bash

echo "🔧 Fixing Livewire 404 Error on Production Server"
echo "=================================================="
echo ""

# Step 1: Check if we're in the right directory
if [ ! -f "artisan" ]; then
    echo "❌ Error: Please run this script from the book-publisher directory"
    exit 1
fi

# Step 2: Publish Livewire assets manually first
echo "📦 Publishing Livewire assets..."
php artisan vendor:publish --tag=livewire:assets --force
echo ""

# Step 3: Verify assets exist
echo "🔍 Verifying assets..."
if [ -d "public/vendor/livewire" ] && [ "$(ls -A public/vendor/livewire)" ]; then
    echo "✓ Livewire assets exist"
    ls -la public/vendor/livewire/*.js | head -3
else
    echo "❌ Livewire assets not found!"
    exit 1
fi
echo ""

# Step 4: Fix permissions
echo "🔐 Fixing permissions..."
chmod -R 775 public/vendor/livewire
chown -R www-data:www-data public/vendor/livewire 2>/dev/null || true
echo "✓ Permissions fixed"
echo ""

# Step 5: Stop containers
echo "🛑 Stopping containers..."
docker-compose down
echo "✓ Containers stopped"
echo ""

# Step 6: Remove old volumes (optional but recommended)
echo "🗑️  Cleaning old volumes..."
docker volume rm book-publisher_app_livewire_book_publisher 2>/dev/null || true
docker volume prune -f 2>/dev/null || true
echo "✓ Old volumes cleaned"
echo ""

# Step 7: Rebuild containers
echo "🔨 Rebuilding containers..."
docker-compose build --no-cache
echo "✓ Containers rebuilt"
echo ""

# Step 8: Start containers
echo "▶️  Starting containers..."
docker-compose up -d
echo "✓ Containers started"
echo ""

# Step 9: Wait for containers to be ready
echo "⏳ Waiting for containers to be ready..."
sleep 5

# Step 10: Verify inside container
echo "🔍 Verifying assets inside container..."
docker exec book-publisher-nginx ls -la /var/www/public/vendor/livewire/ 2>&1 | head -5
echo ""

# Step 11: Test locally
echo "🧪 Testing Livewire assets..."
HTTP_CODE=$(curl -s -o /dev/null -w "%{http_code}" http://localhost:8003/vendor/livewire/livewire.js)
if [ "$HTTP_CODE" = "200" ]; then
    echo "✓ Livewire assets accessible locally (HTTP $HTTP_CODE)"
else
    echo "❌ Livewire assets NOT accessible locally (HTTP $HTTP_CODE)"
fi
echo ""

# Step 12: Clear Cloudflare cache (if using Cloudflare)
echo "☁️  Cloudflare Notice:"
echo "   If you're using Cloudflare, you may need to purge the cache."
echo "   Run: curl -X POST https://api.cloudflare.com/client/v4/zones/YOUR_ZONE/purge_cache"
echo "        -H 'Authorization: Bearer YOUR_TOKEN'"
echo "        -H 'Content-Type: application/json'"
echo "        --data '{\"purge_everything\":true}'"
echo ""

# Step 13: Final verification
echo "✅ Fix Complete!"
echo ""
echo "📍 Test URLs:"
echo "   Local: http://localhost:8003/vendor/livewire/livewire.js"
echo "   Production: https://penerbitskt.naramakna.id/vendor/livewire/livewire.js"
echo ""
echo "📋 Next Steps:"
echo "   1. Clear Cloudflare cache (if using Cloudflare)"
echo "   2. Test in browser: https://penerbitskt.naramakna.id/vendor/livewire/livewire.js"
echo "   3. If still 404, check nginx logs: docker-compose logs nginx"
echo ""
