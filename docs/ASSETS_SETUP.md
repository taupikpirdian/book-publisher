# Docker Assets Configuration

## Uploaded Assets Sync

Docker sekarang dikonfigurasi untuk menyinkronkan file yang di-upload ke folder host di `../assets/book_publisher`.

### Struktur Direktori

```
../assets/book_publisher/          # Host directory (di luar project)
├── images/                        # Uploaded images
├── documents/                     # Uploaded documents
└── ...                            # Other uploaded files
```

### Cara Kerja

1. **Volume Mapping**: Folder `storage/app/public` di dalam container di-map ke `../assets/book_publisher` di host
2. **Nginx**: Kedua service (app & nginx) mengakses folder yang sama
3. **Storage Link**: Laravel storage symlink tetap berfungsi normal

### Setup

Jalankan script setup untuk membuat direktori assets:

```bash
./setup-assets.sh
```

Atau manual:

```bash
mkdir -p ../assets/book_publisher
chmod -R 775 ../assets/book_publisher
```

### Rebuild Docker

Setelah mengubah konfigurasi, rebuild container:

```bash
docker-compose down
docker-compose up --build -d
```

### Verifikasi

Cek apakah assets tersinkronisasi:

```bash
# Di host
ls -la ../assets/book_publisher/

# Di dalam container
docker exec book-publisher ls -la /var/www/storage/app/public/
```

### Upload Assets

Assets yang di-upload melalui Filament atau Laravel storage akan otomatis tersimpan di `../assets/book_publisher`:

```php
// Example: Upload via Laravel
$path = $request->file('image')->store('public/images');
// File akan tersimpan di: ../assets/book_publisher/images/filename.jpg
```

URL access:
```
https://penerbitskt.naramakna.id/storage/images/filename.jpg
```
