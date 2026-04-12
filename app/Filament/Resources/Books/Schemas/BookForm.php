<?php

namespace App\Filament\Resources\Books\Schemas;

use App\Models\Author;
use App\Models\Category;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BookForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Buku')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, callable $set) => $operation === 'create' ? $set('slug', str($state)->slug()) : null),
                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Select::make('author_id')
                            ->label('Author')
                            ->options(fn() => Author::where('is_active', true)->pluck('name', 'id'))
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('category_id')
                            ->label('Category')
                            ->options(fn() => Category::where('type', Category::TYPE_BOOK)->where('is_active', true)->pluck('name', 'id'))
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('Rp'),
                        TextInput::make('cover_image')
                            ->label('Cover Image URL')
                            ->placeholder('Masukkan URL gambar dari Asset Images')
                            ->url()
                            ->default(null),
                        RichEditor::make('synopsis')
                            ->label('Synopsis')
                            ->default(null)
                            ->columnSpanFull(),
                        TextInput::make('isbn')
                            ->default(null),
                        TextInput::make('publisher')
                            ->default(null),
                        DatePicker::make('published_at'),
                        TextInput::make('pages')
                            ->numeric()
                            ->default(null),
                        TextInput::make('language')
                            ->required()
                            ->default('Indonesia'),
                        TextInput::make('dimensions')
                            ->default(null),
                        TextInput::make('weight')
                            ->default(null),
                        TextInput::make('cover_type')
                            ->required()
                            ->default('Soft Cover'),
                        Toggle::make('is_bestseller')
                            ->required(),
                        Toggle::make('is_featured')
                            ->required(),
                        Toggle::make('is_active')
                            ->required(),
                        TextInput::make('order')
                            ->required()
                            ->numeric()
                            ->default(0),
                    ]),

                Section::make('SEO Settings')
                    ->description('Konfigurasi SEO untuk halaman detail buku')
                    ->schema([
                        TextInput::make('meta_title')
                            ->label('Meta Title')
                            ->placeholder('Auto-generate dari judul jika kosong')
                            ->maxLength(60)
                            ->helperText('Maksimal 60 karakter. Ditampilkan di hasil pencarian Google.')
                            ->columnSpanFull(),
                        Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->placeholder('Auto-generate dari synopsis jika kosong')
                            ->maxLength(160)
                            ->rows(3)
                            ->helperText('Maksimal 160 karakter. Deskripsi singkat yang muncul di hasil pencarian.')
                            ->columnSpanFull(),
                        TextInput::make('meta_keywords')
                            ->label('Meta Keywords')
                            ->placeholder('buku, novel, fiksi, nama penulis')
                            ->helperText('Pisahkan dengan koma. Kata kunci untuk SEO.')
                            ->columnSpanFull(),
                        TextInput::make('og_image')
                            ->label('Open Graph Image URL')
                            ->placeholder('URL gambar untuk sharing media sosial')
                            ->url()
                            ->helperText('Gambar yang ditampilkan saat link dibagikan di media sosial.')
                            ->columnSpanFull(),
                        TextInput::make('og_image_alt')
                            ->label('Open Graph Image Alt Text')
                            ->placeholder('Deskripsi gambar untuk aksesibilitas')
                            ->helperText('Deskripsi alternatif untuk gambar OG.')
                            ->columnSpanFull(),
                        TextInput::make('canonical_url')
                            ->label('Canonical URL')
                            ->placeholder('Auto-generate dari slug jika kosong')
                            ->url()
                            ->helperText('URL kanonikal untuk menghindari duplicate content.')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
