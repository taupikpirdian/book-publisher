#!/bin/bash
###############################################################################
# Initialize public assets volume
# Copies public assets from app container to nginx volume
###############################################################################

set -e

echo "📦 Initializing public assets volume..."

# Check if app container is running
if ! docker ps | grep -q book-publisher; then
    echo "❌ App container is not running. Please start it first."
    exit 1
fi

# Check if volume is already populated
if docker exec book-publisher-nginx test -f /var/www/public/vendor/livewire/livewire.js 2>/dev/null; then
    echo "✅ Public assets volume already initialized"
    exit 0
fi

TEMP_DIR=$(mktemp -d)

echo "🔄 Copying vendor folder..."
docker cp book-publisher:/var/www/public/vendor "$TEMP_DIR/"
docker cp "$TEMP_DIR/vendor" book-publisher-nginx:/var/www/public/

echo "🔄 Copying essential files..."
for file in index.php .htaccess robots.txt favicon.ico; do
    docker cp "book-publisher:/var/www/public/$file" "$TEMP_DIR/"
    docker cp "$TEMP_DIR/$file" "book-publisher-nginx:/var/www/public/"
done

# Cleanup
rm -rf "$TEMP_DIR"

echo "✅ Public assets initialized!"
echo "   - Livewire assets: /var/www/public/vendor/livewire/"
echo "   - Essential files: index.php, .htaccess, etc."
