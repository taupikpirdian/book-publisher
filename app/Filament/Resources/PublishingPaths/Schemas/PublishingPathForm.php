<?php

namespace App\Filament\Resources\PublishingPaths\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PublishingPathForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, callable $set) => $operation === 'create' ? $set('slug', str($state)->slug()) : null),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                Select::make('icon')
                    ->label('Icon')
                    ->placeholder('Pilih ikon')
                    ->options([
                        'award' => 'Award (Penerbitan Tradisional)',
                        'zap' => 'Zap (Penerbitan Mandiri)',
                        'users' => 'Users (Kemitraan Komunitas)',
                        'book-open' => 'Book Open',
                        'book' => 'Book',
                        'edit-3' => 'Edit 3',
                        'pen-tool' => 'Pen Tool',
                        'pencil' => 'Pencil',
                        'file-text' => 'File Text',
                        'truck' => 'Truck',
                        'pie-chart' => 'Pie Chart',
                        'bar-chart' => 'Bar Chart',
                        'star' => 'Star',
                        'heart' => 'Heart',
                        'lightbulb' => 'Lightbulb',
                        'target' => 'Target',
                        'trophy' => 'Trophy',
                        'crown' => 'Crown',
                        'shield' => 'Shield',
                        'shield-check' => 'Shield Check',
                        'check-circle' => 'Check Circle',
                        'thumbs-up' => 'Thumbs Up',
                        'handshake' => 'Handshake',
                        'rocket' => 'Rocket',
                        'trending-up' => 'Trending Up',
                        'globe' => 'Globe',
                        'layers' => 'Layers',
                        'graduation-cap' => 'Graduation Cap',
                        'briefcase' => 'Briefcase',
                        'compass' => 'Compass',
                    ])
                    ->searchable()
                    ->preload()
                    ->required()
                    ->hint('Pilih ikon Lucide untuk jalur penerbitan'),
                RichEditor::make('description')
                    ->required()
                    ->columnSpanFull(),
                Repeater::make('features')
                    ->label('Features')
                    ->addActionLabel('Add Feature')
                    ->reorderableWithButtons()
                    ->schema([
                        TextInput::make('feature_text')
                            ->label('Feature Text')
                            ->required(),
                        TextInput::make('feature_description')
                            ->label('Feature Description (optional)'),
                    ])
                    ->defaultItems(0)
                    ->columns(2)
                    ->columnSpanFull()
                    ->helperText('Masukkan daftar fitur/keunggulan untuk jalur penerbitan ini. Gunakan tombol panah untuk mengatur urutan.'),
                TextInput::make('button_text')
                    ->required()
                    ->default('Daftarkan Naskah'),
                TextInput::make('button_url')
                    ->label('Button URL')
                    ->placeholder('https://wa.me/6285846132417')
                    ->url()
                    ->default(null),
                Toggle::make('is_popular')
                    ->label('Tandai sebagai "Paling Populer"')
                    ->default(false),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
