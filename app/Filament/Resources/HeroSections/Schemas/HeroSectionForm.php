<?php

namespace App\Filament\Resources\HeroSections\Schemas;

use Filament\Forms\Components\FileUpload;
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
                TextInput::make('badge_text')
                    ->default(null),
                TextInput::make('badge_icon')
                    ->default(null),
                TextInput::make('title')
                    ->required(),
                TextInput::make('title_highlight')
                    ->default(null),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image_url')
                    ->image(),
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
