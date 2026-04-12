<?php

namespace Database\Seeders;

use App\Models\AboutPage;
use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
{
    public function run(): void
    {
        $aboutPages = [
            [
                'title' => 'Tentang Pustaka Aksara',
                'subtitle' => 'Menerbitkan Karya Terbaik untuk Indonesia yang Lebih Cerdas',
                'description' => '<p>Pustaka Aksara adalah penerbit buku yang berkomitmen untuk menerbitkan karya-karya terbaik dari penulis Indonesia. Didirikan dengan visi menjadi jembatan antara penulis dan pembaca, kami menyediakan layanan penerbitan berkualitas tinggi baik melalui jalur tradisional maupun self-publishing.</p><p>Dengan tim editorial yang berpengalaman dan jaringan distribusi yang luas, kami memastikan setiap buku yang terbit mendapatkan perlakuan terbaik dan menjangkau pembaca yang tepat.</p>',
                'hero_image' => null,
                'contact_address' => 'Jl. Merdeka No. 123, Jakarta Pusat, DKI Jakarta 10110',
                'contact_email' => 'info@pustakaaksara.id',
                'contact_phone' => '(021) 555-0123',
                'social_instagram' => 'https://instagram.com/pustakaaksara',
                'social_twitter' => 'https://twitter.com/pustakaaksara',
                'social_facebook' => 'https://facebook.com/pustakaaksara',
                'social_linkedin' => 'https://linkedin.com/company/pustakaaksara',
                'is_active' => true,
            ],
        ];

        foreach ($aboutPages as $aboutPage) {
            AboutPage::updateOrCreate(
                ['title' => $aboutPage['title']],
                $aboutPage
            );
        }
    }
}
