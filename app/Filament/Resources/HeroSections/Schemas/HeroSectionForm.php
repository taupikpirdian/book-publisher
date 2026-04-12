<?php

namespace App\Filament\Resources\HeroSections\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class HeroSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('title_highlight')
                    ->default(null),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('image_url')
                    ->label('Image URL')
                    ->placeholder('Masukkan URL gambar dari Asset Images')
                    ->url()
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('quote_text')
                    ->default(null),
                TextInput::make('quote_author')
                    ->default(null),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
