<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            // Book Categories
            [
                'name' => 'Novel',
                'type' => Category::TYPE_BOOK,
                'description' => 'Kategori untuk novel fiksi dan sastra',
                'is_active' => true,
            ],
            [
                'name' => 'Non-Fiksi',
                'type' => Category::TYPE_BOOK,
                'description' => 'Kategori untuk buku non-fiksi, panduan, dan referensi',
                'is_active' => true,
            ],
            [
                'name' => 'Anak-anak',
                'type' => Category::TYPE_BOOK,
                'description' => 'Kategori untuk buku anak dan remaja',
                'is_active' => true,
            ],
            [
                'name' => 'Pendidikan',
                'type' => Category::TYPE_BOOK,
                'description' => 'Kategori untuk buku pelajaran dan akademik',
                'is_active' => true,
            ],
            [
                'name' => 'Komik & Manga',
                'type' => Category::TYPE_BOOK,
                'description' => 'Kategori untuk komik, manga, dan graphic novel',
                'is_active' => true,
            ],
            [
                'name' => 'Bisnis & Ekonomi',
                'type' => Category::TYPE_BOOK,
                'description' => 'Kategori untuk buku bisnis, manajemen, dan ekonomi',
                'is_active' => true,
            ],
            [
                'name' => 'Teknologi & Sains',
                'type' => Category::TYPE_BOOK,
                'description' => 'Kategori untuk buku teknologi, sains, dan komputer',
                'is_active' => true,
            ],
            [
                'name' => 'Sejarah & Budaya',
                'type' => Category::TYPE_BOOK,
                'description' => 'Kategori untuk buku sejarah, budaya, dan antropologi',
                'is_active' => true,
            ],
            [
                'name' => 'Agama & Spiritualitas',
                'type' => Category::TYPE_BOOK,
                'description' => 'Kategori untuk buku agama, spiritualitas, dan filosofi',
                'is_active' => true,
            ],
            [
                'name' => 'Kesehatan & Gaya Hidup',
                'type' => Category::TYPE_BOOK,
                'description' => 'Kategori untuk buku kesehatan, kebugaran, dan gaya hidup',
                'is_active' => true,
            ],

            // FAQ Categories (sesuai dengan halaman FAQ)
            [
                'name' => 'Penerbitan',
                'type' => Category::TYPE_FAQ,
                'description' => 'FAQ tentang proses penerbitan buku, pengiriman naskah, dan produksi',
                'is_active' => true,
            ],
            [
                'name' => 'Royalti',
                'type' => Category::TYPE_FAQ,
                'description' => 'FAQ tentang sistem royalti, pembayaran, dan laporan penjualan',
                'is_active' => true,
            ],
            [
                'name' => 'Teknis',
                'type' => Category::TYPE_FAQ,
                'description' => 'FAQ tentang format naskah, ISBN, distribusi, dan aspek teknis lainnya',
                'is_active' => true,
            ],
            [
                'name' => 'Umum',
                'type' => Category::TYPE_FAQ,
                'description' => 'FAQ umum tentang hak cipta, kontak tim, dan informasi lainnya',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($category['name'])],
                $category
            );
        }
    }
}
