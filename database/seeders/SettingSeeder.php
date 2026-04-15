<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            // Site Identity
            'site_name' => 'Pustaka Naramakna',
            'site_tagline' => 'Penerbit Buku Indonesia',
            'logo_url' => null,
            'favicon_url' => null,
            
            // SEO Meta Data
            'meta_title' => 'Penerbit SKT - Pustaka Naramakna',
            'meta_description' => 'Temukan buku-buku terbaik dan kirimkan naskah Anda untuk diterbitkan bersama Pustaka Naramakna. Penerbit buku terpercaya di Indonesia.',
            'meta_keywords' => 'penerbit buku, buku indonesia, pustaka naramakna, kirim naskah, penerbitan buku',
            'og_image' => null,
            
            // Contact Information
            'contact_email' => 'info@pustakaaksara.com',
            'contact_phone' => '+62 858-4613-2417',
            'contact_address' => 'Jakarta, Indonesia',
            'contact_whatsapp' => '6285846132417',
            
            // Social Media
            'social_instagram' => 'https://instagram.com/pustakaaksara',
            'social_twitter' => 'https://twitter.com/pustakaaksara',
            'social_facebook' => 'https://facebook.com/pustakaaksara',
            'social_linkedin' => 'https://linkedin.com/company/pustakaaksara',
            'social_youtube' => null,
            'social_tiktok' => null,
            
            // Footer
            'footer_description' => 'Menerbitkan karya literatur berkualitas yang menginspirasi, mendidik, dan menghibur pembaca di seluruh Indonesia.',
            'show_social_media' => true,
            
            // Status
            'is_active' => true,
        ]);
    }
}
