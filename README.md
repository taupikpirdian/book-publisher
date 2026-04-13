# Book Publisher - Penerbit Buku Digital

Aplikasi web penerbitan buku digital berbasis Laravel + Filament untuk mengelola dan menerbitkan buku-buku berkualitas.

## 🚀 Quick Start

### Local Development

```bash
# 1. Clone repository
git clone <repository-url>
cd book-publisher

# 2. Setup environment
cp .env.example .env

# 3. Quick setup (install + build + migrate)
composer run setup

# 4. Start development servers
composer run dev
```

App akan berjalan di: **http://localhost:8003**

### Production Deployment

Lihat [Production Deployment Guide](docs/PRODUCTION_DEPLOYMENT.md) untuk instruksi lengkap deploy ke server production.

## 📁 Struktur Aplikasi

```
book-publisher/
├── app/                    # Application code
│   ├── Filament/          # Admin panel resources
│   ├── Http/Controllers/  # Web controllers
│   └── Models/            # Eloquent models
├── config/                # Configuration files
├── database/              # Migrations & seeders
├── docs/                  # Documentation
│   ├── ASSETS_SETUP.md
│   ├── DOCKER_ASSETS_SYNC_SUMMARY.md
│   └── PRODUCTION_DEPLOYMENT.md
├── docker/                # Docker configurations
│   └── nginx.conf
├── public/                # Public assets
│   └── vendor/livewire/   # Published Livewire assets
├── resources/views/       # Blade templates
├── routes/                # Route definitions
└── storage/               # Uploaded files & logs
```

## 🔧 Teknologi yang Digunakan

- **Backend**: Laravel 13, PHP 8.3
- **Frontend**: Vite, Tailwind CSS
- **Admin Panel**: Filament 5
- **Database**: MySQL
- **Live Components**: Livewire 4
- **Containerization**: Docker & Docker Compose
- **Web Server**: Nginx

## 📦 Docker Setup

### Architecture

```
Host Directory                    Container Path
─────────────────                 ──────────────
../assets/book_publisher/    →    /var/www/storage/app/public/  (uploaded files)
./public/                    →    /var/www/public/              (public assets)
./storage/logs/              →    /var/www/storage/logs/        (logs)
```

### Commands

```bash
# Build & start containers
docker-compose up --build -d

# Stop containers
docker-compose down

# View logs
docker-compose logs -f

# Access container
docker-compose exec app bash

# Run artisan commands
docker-compose exec app php artisan <command>

# Rebuild after changes
docker-compose down && docker-compose build --no-cache && docker-compose up -d
```

### Uploaded Assets

Assets yang di-upload melalui Filament/Laravel otomatis tersimpan di:
- **Host**: `../assets/book_publisher/`
- **URL**: `https://penerbitskt.naramakna.id/storage/filename.jpg`

## 🛠️ Development Commands

```bash
# Start development (server + queue + logs + vite)
composer run dev

# Run tests
composer run test

# Build frontend assets
npm run build

# Publish Livewire assets
php artisan vendor:publish --tag=livewire:assets --force

# Create storage symlink
php artisan storage:link

# Clear cache
php artisan optimize:clear

# Optimise for production
php artisan optimize
```

## 📚 Documentation

- [Assets Setup Guide](docs/ASSETS_SETUP.md) - Cara setup uploaded assets sync
- [Docker Assets Sync](docs/DOCKER_ASSETS_SYNC_SUMMARY.md) - Docker assets configuration
- [Production Deployment](docs/PRODUCTION_DEPLOYMENT.md) - Deploy ke production server

## 🔐 Environment Setup

Copy `.env.example` to `.env` dan configure:

```env
APP_NAME="Book Publisher"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8003

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=book-publisher
DB_USERNAME=root
DB_PASSWORD=p@ssword
```

## 🐛 Troubleshooting

### Livewire 404 Error

```bash
# Re-publish Livewire assets
php artisan vendor:publish --tag=livewire:assets --force

# Rebuild containers
docker-compose down && docker-compose build --no-cache && docker-compose up -d
```

### Uploaded Files Not Syncing

```bash
# Check volume mount
docker-compose exec app ls -la /var/www/storage/app/public/

# Fix permissions
chmod -R 775 ../assets/book_publisher
```

### Cache Issues

```bash
php artisan optimize:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## 📝 License

This project is proprietary and confidential.

## 👥 Support

Untuk pertanyaan atau bantuan, hubungi tim development.
