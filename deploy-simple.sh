#!/bin/bash

###############################################################################
# Simple Production Deploy Script (No PHP/Composer required on host)
# Usage: ./deploy-simple.sh
###############################################################################

echo "🚀 Simple Production Deploy"
echo "==========================="
echo ""

# Stop containers
echo "🛑 Stopping containers..."
docker-compose down
echo ""

# Rebuild everything
echo "🔨 Rebuilding containers (this may take a few minutes)..."
docker-compose build --no-cache
echo ""

# Start containers
echo "▶️  Starting containers..."
docker-compose up -d
echo ""

# Wait for startup
echo "⏳ Waiting for containers..."
sleep 5

# Verify
echo "🔍 Verifying deployment..."
if docker exec book-publisher-nginx test -f /var/www/public/vendor/livewire/livewire.js; then
    echo "✅ Livewire assets OK"
else
    echo "❌ Livewire assets NOT found"
    exit 1
fi

HTTP_CODE=$(curl -s -o /dev/null -w "%{http_code}" http://localhost:8003/vendor/livewire/livewire.js 2>/dev/null || echo "000")
echo "   Local test: HTTP $HTTP_CODE"
echo ""

echo "✅ Deploy complete!"
echo ""
echo "📋 Next steps:"
echo "   1. Clear Cloudflare cache (important!)"
echo "   2. Test: curl -I https://penerbitskt.naramakna.id/vendor/livewire/livewire.js"
echo "   3. Check: https://penerbitskt.naramakna.id"
