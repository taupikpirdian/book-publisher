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
                TextInput::make('contact_address')
                    ->default(null),
                TextInput::make('contact_email')
                    ->email()
                    ->default(null),
                TextInput::make('contact_phone')
                    ->tel()
                    ->default(null),
                TextInput::make('social_instagram')
                    ->default(null),
                TextInput::make('social_twitter')
                    ->default(null),
                TextInput::make('social_facebook')
                    ->default(null),
                TextInput::make('social_linkedin')
                    ->default(null),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
