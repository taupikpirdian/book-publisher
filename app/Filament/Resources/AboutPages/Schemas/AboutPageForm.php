<?php

namespace App\Filament\Resources\AboutPages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
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
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('hero_image')
                    ->image(),
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
