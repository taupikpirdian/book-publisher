<?php

namespace App\Filament\Resources\AboutPages\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AboutPageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('subtitle')
                    ->default(null),
                RichEditor::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('hero_image')
                    ->label('Hero Image URL')
                    ->placeholder('Masukkan URL gambar dari Asset Images')
                    ->url()
                    ->default(null)
                    ->helperText('Dapatkan URL dari menu Asset Images'),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
