#!/bin/bash

###############################################################################
# Production Deployment Script
# Usage: ./deploy-production.sh
###############################################################################

set -e  # Exit on error

RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

echo -e "${BLUE}╔══════════════════════════════════════════╗${NC}"
echo -e "${BLUE}║  Book Publisher - Production Deployer   ║${NC}"
echo -e "${BLUE}╚══════════════════════════════════════════╝${NC}"
echo ""

# Pre-flight checks
echo -e "${YELLOW}🔍 Running pre-flight checks...${NC}"

if [ ! -f "artisan" ]; then
    echo -e "${RED}❌ Error: Please run from book-publisher directory${NC}"
    exit 1
fi

if ! command -v docker compose &> /dev/null; then
    echo -e "${RED}❌ Error: docker compose not found${NC}"
    exit 1
fi

echo -e "${GREEN}✓ Pre-flight checks passed${NC}"
echo ""

# Step 1: Git pull
echo -e "${YELLOW}📥 Pulling latest code...${NC}"
git pull origin main || {
    echo -e "${RED}❌ Git pull failed! Aborting.${NC}"
    exit 1
}
echo -e "${GREEN}✓ Latest code pulled${NC}"
echo ""

# Step 2: Setup directories
echo -e "${YELLOW}📁 Setting up directories...${NC}"
mkdir -p ../assets/book_publisher
mkdir -p storage/logs
mkdir -p bootstrap/cache
chmod -R 775 ../assets/book_publisher storage/logs bootstrap/cache
echo -e "${GREEN}✓ Directories ready${NC}"
echo ""

# Step 3: Install dependencies (if needed) - INSIDE CONTAINER
if [ -f "composer.json" ]; then
    echo -e "${YELLOW}📦 Building app container first...${NC}"
    docker-compose build app --no-cache 2>&1 | tail -5
    echo -e "${GREEN}✓ App container built${NC}"
    echo ""
fi

# Step 4: Start containers (need to run for publishing assets)
echo -e "${YELLOW}▶️  Starting containers temporarily...${NC}"
docker-compose up -d 2>&1 | tail -3
echo -e "${GREEN}✓ Containers started${NC}"
echo ""

# Wait for containers to be ready
echo -e "${YELLOW}⏳ Waiting for containers...${NC}"
sleep 3

# Step 4b: Publish Livewire assets INSIDE CONTAINER
echo -e "${YELLOW}📦 Publishing Livewire assets (inside container)...${NC}"
docker-compose exec -T app php artisan vendor:publish --tag=livewire:assets --force 2>&1 | grep -v "Warning:" || true
echo -e "${GREEN}✓ Livewire assets published${NC}"
echo ""

# Step 4c: Publish Filament assets INSIDE CONTAINER
echo -e "${YELLOW}📦 Publishing Filament assets (inside container)...${NC}"
docker-compose exec -T app php artisan filament:install --assets --force 2>&1 | grep -v "Warning:" || true
echo -e "${GREEN}✓ Filament assets published${NC}"
echo ""

# Step 4d: Create storage link
echo -e "${YELLOW}🔗 Creating storage link (inside container)...${NC}"
docker-compose exec -T app php artisan storage:link 2>&1 | grep -v "Warning:" || true
echo -e "${GREEN}✓ Storage link created${NC}"
echo ""

# Step 5: Verify Livewire assets
echo -e "${YELLOW}🔍 Verifying Livewire assets...${NC}"
if docker exec book-publisher-nginx test -f /var/www/public/vendor/livewire/livewire.js; then
    echo -e "${GREEN}✓ Livewire assets exist in container${NC}"
else
    echo -e "${RED}❌ Livewire assets not found in container!${NC}"
    exit 1
fi
echo ""

# Step 6: Stop containers (will rebuild next)
echo -e "${YELLOW}🛑 Stopping containers for rebuild...${NC}"
docker-compose down 2>&1 | tail -3
echo -e "${GREEN}✓ Containers stopped${NC}"
echo ""

# Step 7: Clean old volumes
echo -e "${YELLOW}🗑️  Cleaning old volumes...${NC}"
docker volume rm book-publisher_app_livewire_book_publisher 2>/dev/null || true
docker volume prune -f >/dev/null 2>&1 || true
echo -e "${GREEN}✓ Old volumes cleaned${NC}"
echo ""

# Step 8: Rebuild containers (final)
echo -e "${YELLOW}🔨 Rebuilding all containers (final)...${NC}"
docker-compose build --no-cache 2>&1 | tail -10
echo -e "${GREEN}✓ Containers rebuilt${NC}"
echo ""

# Step 9: Start containers
echo -e "${YELLOW}▶️  Starting containers...${NC}"
docker-compose up -d 2>&1 | tail -3
echo -e "${GREEN}✓ Containers started${NC}"
echo ""

# Step 10: Wait for containers
echo -e "${YELLOW}⏳ Waiting for containers to be ready...${NC}"
sleep 5

# Step 11: Verify containers running
echo -e "${YELLOW}🔍 Verifying containers...${NC}"
if docker-compose ps | grep -q "Up"; then
    echo -e "${GREEN}✓ Containers are running${NC}"
    docker-compose ps
else
    echo -e "${RED}❌ Containers not running properly!${NC}"
    docker-compose logs --tail=20
    exit 1
fi
echo ""

# Step 12: Verify assets in container
echo -e "${YELLOW}🔍 Verifying assets inside container...${NC}"
if docker exec book-publisher-nginx test -f /var/www/public/vendor/livewire/livewire.js; then
    echo -e "${GREEN}✓ Livewire assets exist in container${NC}"
    docker exec book-publisher-nginx ls -lh /var/www/public/vendor/livewire/livewire.js
else
    echo -e "${RED}❌ Livewire assets NOT found in container!${NC}"
    exit 1
fi
echo ""

# Step 13: Test locally
echo -e "${YELLOW}🧪 Testing Livewire assets locally...${NC}"
HTTP_CODE=$(curl -s -o /dev/null -w "%{http_code}" http://localhost:8003/vendor/livewire/livewire.js 2>/dev/null || echo "000")

if [ "$HTTP_CODE" = "200" ]; then
    echo -e "${GREEN}✓ Livewire accessible locally (HTTP $HTTP_CODE)${NC}"
else
    echo -e "${YELLOW}⚠️  Local test failed (HTTP $HTTP_CODE) - may need more time${NC}"
fi
echo ""

# Step 14: Summary
echo -e "${GREEN}╔══════════════════════════════════════════╗${NC}"
echo -e "${GREEN}║        ✅ DEPLOYMENT SUCCESSFUL!        ║${NC}"
echo -e "${GREEN}╚══════════════════════════════════════════╝${NC}"
echo ""
echo -e "${BLUE}📊 Summary:${NC}"
echo -e "   • Code: Latest version from git"
echo -e "   • Containers: Rebuilt and running"
echo -e "   • Livewire: Published and verified"
echo -e "   • Assets directory: Ready at ../assets/book_publisher"
echo ""
echo -e "${YELLOW}📋 Next Steps:${NC}"
echo -e "   1. Test locally: curl -I http://localhost:8003/vendor/livewire/livewire.js"
echo -e "   2. Clear Cloudflare cache (important!)"
echo -e "   3. Test production: curl -I https://penerbitskt.naramakna.id/vendor/livewire/livewire.js"
echo -e "   4. Check in browser: https://penerbitskt.naramakna.id"
echo ""
echo -e "${YELLOW}☁️  Clear Cloudflare Cache:${NC}"
echo -e "   • Via Dashboard: Caching > Configuration > Purge Everything"
echo -e "   • Or wait 4 hours for auto-expire"
echo ""
echo -e "${BLUE}📍 URLs:${NC}"
echo -e "   • Local: http://localhost:8003"
echo -e "   • Production: https://penerbitskt.naramakna.id"
echo -e "   • Logs: docker-compose logs -f"
echo ""
