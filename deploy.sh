#!/bin/bash

echo "🚀 Deploying Book Publisher with Livewire Assets..."
echo ""

# Step 1: Publish Livewire assets to public directory
echo "📦 Publishing Livewire assets..."
php artisan vendor:publish --tag=livewire:assets --force
echo "✓ Livewire assets published"
echo ""

# Step 2: Stop containers
echo "🛑 Stopping containers..."
docker-compose down
echo "✓ Containers stopped"
echo ""

# Step 3: Rebuild containers
echo "🔨 Rebuilding containers..."
docker-compose build --no-cache
echo "✓ Containers rebuilt"
echo ""

# Step 4: Start containers
echo "▶️  Starting containers..."
docker-compose up -d
echo "✓ Containers started"
echo ""

# Step 5: Verify
echo "✨ Verifying deployment..."
sleep 2
if [ -d "public/vendor/livewire" ] && [ "$(ls -A public/vendor/livewire)" ]; then
    echo "✓ Livewire assets exist in public/vendor/livewire/"
    echo "✓ Files:"
    ls -1 public/vendor/livewire/*.js | head -3
else
    echo "⚠️  Warning: Livewire assets not found!"
fi
echo ""

echo "✅ Deployment complete!"
echo "📍 Livewire assets location: public/vendor/livewire/"
echo "📍 Uploaded assets location: ../assets/book_publisher/"
echo ""
echo "Access your app at: http://localhost:8003"
