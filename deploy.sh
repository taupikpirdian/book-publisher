#!/bin/sh

set -eu

echo "🚀 Starting deployment..."

# Build image dulu (app masih jalan)

echo "🔨 Rebuilding Docker image..."
docker compose build app nginx

# Recreate container tanpa mematikan service lain

echo "▶️  Restarting app and nginx containers..."
docker compose up -d --no-deps app nginx

echo "✅ Deployment complete!"
