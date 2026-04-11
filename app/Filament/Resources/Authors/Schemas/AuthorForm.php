<?php

namespace App\Filament\Resources\Authors\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AuthorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('photo_url')
                    ->url()
                    ->default(null),
                TextInput::make('birth_place')
                    ->default(null),
                DatePicker::make('birth_date'),
                Textarea::make('biography')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('achievements')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                TextInput::make('website')
                    ->url()
                    ->default(null),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
