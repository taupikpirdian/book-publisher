#!/bin/sh

set -eu

echo "🚀 Starting deployment..."

# Build image dulu (app masih jalan)

echo "🔨 Rebuilding Docker image..."
docker compose build app

# Recreate container tanpa mematikan service lain

echo "▶️  Restarting app container..."
docker compose up -d --no-deps app

echo "✅ Deployment complete!"
