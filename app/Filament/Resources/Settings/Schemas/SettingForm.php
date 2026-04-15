<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Site Identity')
                    ->description('Identitas website Pustaka Aksara')
                    ->schema([
                        TextInput::make('site_name')
                            ->label('Site Name')
                            ->required()
                            ->default('Pustaka Aksara')
                            ->helperText('Nama website yang akan ditampilkan di navbar dan footer'),
                        TextInput::make('site_tagline')
                            ->label('Tagline')
                            ->default(null)
                            ->helperText('Tagline singkat untuk website'),
                        TextInput::make('logo_url')
                            ->label('Logo URL')
                            ->placeholder('https://example.com/logo.png')
                            ->url()
                            ->default(null)
                            ->helperText('URL logo website. Kosongkan untuk menggunakan icon default'),
                        TextInput::make('favicon_url')
                            ->label('Favicon URL')
                            ->placeholder('https://example.com/favicon.ico')
                            ->url()
                            ->default(null)
                            ->helperText('URL favicon website'),
                    ])->columns(2),

                Section::make('SEO Meta Data')
                    ->description('Pengaturan SEO untuk website')
                    ->schema([
                        TextInput::make('meta_title')
                            ->label('Meta Title')
                            ->required()
                            ->default('Pustaka Aksara - Penerbit Buku Indonesia')
                            ->helperText('Title untuk SEO (50-60 karakter)'),
                        RichEditor::make('meta_description')
                            ->label('Meta Description')
                            ->default(null)
                            ->helperText('Deskripsi untuk SEO (150-160 karakter)')
                            ->columnSpanFull(),
                        TextInput::make('meta_keywords')
                            ->label('Meta Keywords')
                            ->default(null)
                            ->helperText('Keywords dipisahkan koma: buku, penerbit, novel'),
                        TextInput::make('og_image')
                            ->label('OG Image URL')
                            ->placeholder('https://example.com/og-image.jpg')
                            ->url()
                            ->default(null)
                            ->helperText('Gambar untuk Open Graph (Facebook, WhatsApp, dll)')
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Contact Information')
                    ->description('Informasi kontak perusahaan')
                    ->schema([
                        TextInput::make('contact_email')
                            ->label('Contact Email')
                            ->email()
                            ->default(null)
                            ->helperText('Email utama untuk kontak'),
                        TextInput::make('contact_phone')
                            ->label('Contact Phone')
                            ->tel()
                            ->default(null)
                            ->helperText('Nomor telepon kontak'),
                        TextInput::make('contact_address')
                            ->label('Contact Address')
                            ->default(null)
                            ->helperText('Alamat lengkap perusahaan')
                            ->columnSpanFull(),
                        TextInput::make('contact_whatsapp')
                            ->label('WhatsApp Number')
                            ->placeholder('6281234567890')
                            ->tel()
                            ->default(null)
                            ->helperText('Nomor WhatsApp untuk tombol "Kirim Naskah" dan kontak. Format: 62xxxxxxxxxx')
                            ->rule('regex:/^62[0-9]{9,12}$/')
                            ->validationMessages(['regex' => 'Nomor WhatsApp harus dimulai dengan 62 dan diikuti 9-12 digit angka.'])
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Social Media')
                    ->description('Link sosial media perusahaan')
                    ->schema([
                        TextInput::make('social_instagram')
                            ->label('Instagram URL')
                            ->url()
                            ->default(null)
                            ->placeholder('https://instagram.com/username'),
                        TextInput::make('social_twitter')
                            ->label('Twitter URL')
                            ->url()
                            ->default(null)
                            ->placeholder('https://twitter.com/username'),
                        TextInput::make('social_facebook')
                            ->label('Facebook URL')
                            ->url()
                            ->default(null)
                            ->placeholder('https://facebook.com/page'),
                        TextInput::make('social_linkedin')
                            ->label('LinkedIn URL')
                            ->url()
                            ->default(null)
                            ->placeholder('https://linkedin.com/company'),
                        TextInput::make('social_youtube')
                            ->label('YouTube URL')
                            ->url()
                            ->default(null)
                            ->placeholder('https://youtube.com/channel'),
                        TextInput::make('social_tiktok')
                            ->label('TikTok URL')
                            ->url()
                            ->default(null)
                            ->placeholder('https://tiktok.com/@username'),
                    ])->columns(2),

                Section::make('Footer Settings')
                    ->description('Pengaturan tampilan footer')
                    ->schema([
                        RichEditor::make('footer_description')
                            ->label('Footer Description')
                            ->default(null)
                            ->helperText('Deskripsi yang ditampilkan di footer')
                            ->columnSpanFull(),
                        Toggle::make('show_social_media')
                            ->label('Show Social Media Icons')
                            ->default(true)
                            ->helperText('Tampilkan icon sosial media di footer'),
                    ]),

                Section::make('Status')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Active')
                            ->required()
                            ->default(true)
                            ->helperText('Setting aktif dan digunakan di website'),
                    ]),
            ]);
    }
}
