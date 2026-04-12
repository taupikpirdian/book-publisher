<?php

namespace App\Filament\Resources\CompanyValues\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CompanyValueForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Select::make('icon')
                    ->label('Icon')
                    ->placeholder('Pilih ikon')
                    ->options([
                        // Book & Writing related
                        'book-open' => 'Book Open',
                        'book' => 'Book',
                        'edit-3' => 'Edit 3 (Pen)',
                        'pen-tool' => 'Pen Tool',
                        'pencil' => 'Pencil',
                        'file-text' => 'File Text',
                        'scroll' => 'Scroll',
                        'bookmark' => 'Bookmark',
                        'edit' => 'Edit',
                        'send' => 'Send',
                        'quote' => 'Quote',
                        // Achievement & Quality
                        'award' => 'Award',
                        'star' => 'Star',
                        'trophy' => 'Trophy',
                        'medal' => 'Medal',
                        'crown' => 'Crown',
                        'check' => 'Check',
                        'check-circle' => 'Check Circle',
                        'thumbs-up' => 'Thumbs Up',
                        // Business & Distribution
                        'truck' => 'Truck',
                        'pie-chart' => 'Pie Chart',
                        'bar-chart' => 'Bar Chart',
                        'trending-up' => 'Trending Up',
                        'target' => 'Target',
                        'briefcase' => 'Briefcase',
                        'handshake' => 'Handshake',
                        // People & Community
                        'users' => 'Users',
                        'user-check' => 'User Check',
                        'heart' => 'Heart',
                        'lightbulb' => 'Lightbulb',
                        // Navigation & Tools
                        'zap' => 'Zap',
                        'rocket' => 'Rocket',
                        'compass' => 'Compass',
                        'navigation' => 'Navigation',
                        'flag' => 'Flag',
                        // Communication & Contact
                        'mail' => 'Mail',
                        'phone' => 'Phone',
                        'map-pin' => 'Map Pin',
                        'home' => 'Home',
                        'building' => 'Building',
                        // General
                        'globe' => 'Globe',
                        'clock' => 'Clock',
                        'sparkles' => 'Sparkles',
                        'layers' => 'Layers',
                        'layout' => 'Layout',
                        'shield' => 'Shield',
                        'shield-check' => 'Shield Check',
                        'search' => 'Search',
                        'eye' => 'Eye',
                        'arrow-right' => 'Arrow Right',
                        'chevron-right' => 'Chevron Right',
                    ])
                    ->searchable()
                    ->preload()
                    ->default(null)
                    ->hint('Pilih ikon Lucide untuk merepresentasikan nilai perusahaan'),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
