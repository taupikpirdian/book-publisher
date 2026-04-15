#!/bin/bash

echo "🚀 Starting deployment..."

# Build image dulu (app masih jalan)

echo "🔨 Rebuilding Docker image..."
docker compose build

# Recreate container tanpa mematikan service lain

echo "▶️  Restarting containers..."
docker compose up -d --no-deps --build

echo "✅ Deployment complete!"